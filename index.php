<?

require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");

use Bitrix\Main\Entity\DataManager;
use Bitrix\Main\Entity\IntegerField;
use Bitrix\Main\Entity\StringField;
use Bitrix\Main\ORM\Fields\Relations\Reference;

class CategoryTable extends DataManager
{
    public static function getTableName(): string
    {
        return 'categories';
    }

    public static function getMap(): array
    {
        return [
            'ID'     => new IntegerField(
                'ID',
                [
                    'primary'      => true,
                    'autocomplete' => true
                ]
            ),
            'TITLE'  => new StringField(
                'UF_TITLE'
            ),
            'XML_ID' => new StringField(
                'UF_XML_ID'
            )
        ];
    }
}

class NewsTable extends Bitrix\Iblock\Elements\ElementNewsTable
{
    public static function getMap(): array
    {
        $arFields = parent::getMap();

        $arFields['CATEGORY'] = new Reference('CATEGORY', CategoryTable::class, [
            'join_type' => 'inner'
        ]);

        return $arFields;
    }
}

class ParserRssLenta
{
    const URL = 'https://lenta.ru/rss';
    private $latestNewsPubDate = null;
    private $rssBody = null;
    private $rawCategories = [];
    private $news = [];

    public function parse()
    {
        $this->getLatestNewsPubDate();
        $this->requestRss();
        $this->parseRssBody();
        $this->getCategories();
        $this->addNews();
    }

    private function getLatestNewsPubDate()
    {
        $latestNewsItem = NewsTable::getList([
            'limit'  => 1,
            'order'  => ['ACTIVE_FROM' => 'DESC'],
            'select' => ['ACTIVE_FROM']
        ])->fetch();

        if ($latestNewsItem && $latestNewsItem['ACTIVE_FROM']) {
            $this->latestNewsPubDate = $latestNewsItem['ACTIVE_FROM'];
        }
    }

    private function requestRss()
    {
        $this->rssBody = @simplexml_load_file(self::URL);
    }

    private function parseRssBody()
    {
        foreach ($this->rssBody->channel->item as $item) {
            $pubDate = \Bitrix\Main\Type\DateTime::createFromTimestamp(strtotime($item->pubDate));

            if (!is_null($this->latestNewsPubDate) && $this->latestNewsPubDate >= $pubDate) {
                break;
            }

            $category                    = (string)$item->category;
            $xmlId                       = md5(strtolower(trim($category)));
            $this->rawCategories[$xmlId] = $category;
            $this->news[]                = [
                'NAME'        => (string)$item->title,
                'DESCRIPTION' => (string)$item->description,
                'ACTIVE_FROM' => $pubDate,
                'CATEGORY'    => $xmlId
            ];
        }
    }

    private function getCategories()
    {
        $rsCategories = CategoryTable::getList([
            'filter' => [
                'XML_ID' => array_keys($this->rawCategories)
            ]
        ])->fetchAll();

        foreach ($rsCategories as $category) {
            if (array_key_exists($category['XML_ID'], $this->rawCategories)) {
                unset($this->rawCategories[$category['XML_ID']]);
            }
        }

        if (!empty($this->rawCategories)) {
            foreach ($this->rawCategories as $xmlId => $category) {
                CategoryTable::add([
                    'XML_ID' => $xmlId,
                    'TITLE'  => $category
                ]);
            }
        }
    }

    private function addNews()
    {
        foreach ($this->news as $newsItem) {
            $res = NewsTable::add($newsItem);

            NewsTable::getByPrimary($res->getId(), [
                'select' => ['CATEGORY', '*']
            ])
                ->fetchObject()
                ->getCategory()
                ->setValue($newsItem['CATEGORY'])
                ->save();
        }
    }
}

//(new ParserRssLenta())->parse();

function getNewsByCategoryName($categoryName)
{
    $categoryXmlId = CategoryTable::getList([
        'filter' => [
            'TITLE' => $categoryName
        ]
    ])
        ->fetchObject()
        ->getXmlId();

    $news = NewsTable::getList([
        'filter' => [
            'NEWS_CATEGORY_VALUE' => $categoryXmlId
        ],
        'select' => [
            'CATEGORY',
            '*'
        ]
    ])->fetchAll();
}