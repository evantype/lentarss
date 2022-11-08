<?php

namespace Sprint\Migration;


class CreateHlBlockCategoriesAndIblockNews20221108075452 extends Version
{
    protected $description = "";

    protected $moduleVersion = "4.1.2";

    /**
     * @return bool|void
     * @throws Exceptions\HelperException
     */
    public function up()
    {
        $helper    = $this->getHelperManager();
        $hlblockId = $helper->Hlblock()->saveHlblock(array(
            'NAME'       => 'Categories',
            'TABLE_NAME' => 'categories',
            'LANG'       =>
                array(
                    'ru' =>
                        array(
                            'NAME' => 'Категории',
                        ),
                    'en' =>
                        array(
                            'NAME' => 'Categories',
                        ),
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME'        => 'UF_TITLE',
            'USER_TYPE_ID'      => 'string',
            'XML_ID'            => '',
            'SORT'              => '100',
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'N',
            'SHOW_FILTER'       => 'N',
            'SHOW_IN_LIST'      => 'Y',
            'EDIT_IN_LIST'      => 'Y',
            'IS_SEARCHABLE'     => 'N',
            'SETTINGS'          =>
                array(
                    'SIZE'          => 20,
                    'ROWS'          => 1,
                    'REGEXP'        => '',
                    'MIN_LENGTH'    => 0,
                    'MAX_LENGTH'    => 0,
                    'DEFAULT_VALUE' => '',
                ),
            'EDIT_FORM_LABEL'   =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'ERROR_MESSAGE'     =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE'      =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
        ));
        $helper->Hlblock()->saveField($hlblockId, array(
            'FIELD_NAME'        => 'UF_XML_ID',
            'USER_TYPE_ID'      => 'string',
            'XML_ID'            => '',
            'SORT'              => '100',
            'MULTIPLE'          => 'N',
            'MANDATORY'         => 'N',
            'SHOW_FILTER'       => 'N',
            'SHOW_IN_LIST'      => 'Y',
            'EDIT_IN_LIST'      => 'Y',
            'IS_SEARCHABLE'     => 'N',
            'SETTINGS'          =>
                array(
                    'SIZE'          => 20,
                    'ROWS'          => 1,
                    'REGEXP'        => '',
                    'MIN_LENGTH'    => 0,
                    'MAX_LENGTH'    => 0,
                    'DEFAULT_VALUE' => '',
                ),
            'EDIT_FORM_LABEL'   =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_COLUMN_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'LIST_FILTER_LABEL' =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'ERROR_MESSAGE'     =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
            'HELP_MESSAGE'      =>
                array(
                    'en' => '',
                    'ru' => '',
                ),
        ));

        $helper->Iblock()->saveIblockType(array(
            'ID'               => 'content',
            'SECTIONS'         => 'Y',
            'EDIT_FILE_BEFORE' => '',
            'EDIT_FILE_AFTER'  => '',
            'IN_RSS'           => 'N',
            'SORT'             => '50',
            'LANG'             =>
                array(
                    'ru' =>
                        array(
                            'NAME'         => 'Контент',
                            'SECTION_NAME' => 'Разделы',
                            'ELEMENT_NAME' => 'Элементы',
                        ),
                    'en' =>
                        array(
                            'NAME'         => 'Content',
                            'SECTION_NAME' => 'Sections',
                            'ELEMENT_NAME' => 'Elements',
                        ),
                ),
        ));
        $iblockId = $helper->Iblock()->saveIblock(array(
            'IBLOCK_TYPE_ID'      => 'content',
            'LID'                 =>
                array(
                    0 => 's1',
                ),
            'CODE'                => 'news',
            'API_CODE'            => 'news',
            'NAME'                => 'Новости',
            'ACTIVE'              => 'Y',
            'SORT'                => '500',
            'LIST_PAGE_URL'       => '',
            'DETAIL_PAGE_URL'     => '',
            'SECTION_PAGE_URL'    => '',
            'CANONICAL_PAGE_URL'  => '',
            'PICTURE'             => null,
            'DESCRIPTION'         => '',
            'DESCRIPTION_TYPE'    => 'text',
            'RSS_TTL'             => '24',
            'RSS_ACTIVE'          => 'Y',
            'RSS_FILE_ACTIVE'     => 'N',
            'RSS_FILE_LIMIT'      => null,
            'RSS_FILE_DAYS'       => null,
            'RSS_YANDEX_ACTIVE'   => 'N',
            'XML_ID'              => '',
            'INDEX_ELEMENT'       => 'Y',
            'INDEX_SECTION'       => 'N',
            'WORKFLOW'            => 'N',
            'BIZPROC'             => 'N',
            'SECTION_CHOOSER'     => 'L',
            'LIST_MODE'           => '',
            'RIGHTS_MODE'         => 'S',
            'SECTION_PROPERTY'    => 'N',
            'PROPERTY_INDEX'      => 'N',
            'VERSION'             => '2',
            'LAST_CONV_ELEMENT'   => '0',
            'SOCNET_GROUP_ID'     => null,
            'EDIT_FILE_BEFORE'    => '',
            'EDIT_FILE_AFTER'     => '',
            'SECTIONS_NAME'       => 'Разделы',
            'SECTION_NAME'        => 'Раздел',
            'ELEMENTS_NAME'       => 'Элементы',
            'ELEMENT_NAME'        => 'Элемент',
            'REST_ON'             => 'Y',
            'EXTERNAL_ID'         => '',
            'LANG_DIR'            => '/',
            'SERVER_NAME'         => '',
            'IPROPERTY_TEMPLATES' =>
                array(),
            'ELEMENT_ADD'         => 'Добавить элемент',
            'ELEMENT_EDIT'        => 'Изменить элемент',
            'ELEMENT_DELETE'      => 'Удалить элемент',
            'SECTION_ADD'         => 'Добавить раздел',
            'SECTION_EDIT'        => 'Изменить раздел',
            'SECTION_DELETE'      => 'Удалить раздел',
        ));
        $helper->Iblock()->saveIblockFields($iblockId, array(
            'IBLOCK_SECTION'           =>
                array(
                    'NAME'          => 'Привязка к разделам',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'KEEP_IBLOCK_SECTION_ID' => 'N',
                        ),
                ),
            'ACTIVE'                   =>
                array(
                    'NAME'          => 'Активность',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => 'Y',
                ),
            'ACTIVE_FROM'              =>
                array(
                    'NAME'          => 'Начало активности',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'ACTIVE_TO'                =>
                array(
                    'NAME'          => 'Окончание активности',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'SORT'                     =>
                array(
                    'NAME'          => 'Сортировка',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '0',
                ),
            'NAME'                     =>
                array(
                    'NAME'          => 'Название',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => '',
                ),
            'PREVIEW_PICTURE'          =>
                array(
                    'NAME'          => 'Картинка для анонса',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'FROM_DETAIL'             => 'N',
                            'SCALE'                   => 'N',
                            'WIDTH'                   => '',
                            'HEIGHT'                  => '',
                            'IGNORE_ERRORS'           => 'N',
                            'METHOD'                  => 'resample',
                            'COMPRESSION'             => 95,
                            'DELETE_WITH_DETAIL'      => 'N',
                            'UPDATE_WITH_DETAIL'      => 'N',
                            'USE_WATERMARK_TEXT'      => 'N',
                            'WATERMARK_TEXT'          => '',
                            'WATERMARK_TEXT_FONT'     => '',
                            'WATERMARK_TEXT_COLOR'    => '',
                            'WATERMARK_TEXT_SIZE'     => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE'      => 'N',
                            'WATERMARK_FILE'          => '',
                            'WATERMARK_FILE_ALPHA'    => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER'    => null,
                        ),
                ),
            'PREVIEW_TEXT_TYPE'        =>
                array(
                    'NAME'          => 'Тип описания для анонса',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ),
            'PREVIEW_TEXT'             =>
                array(
                    'NAME'          => 'Описание для анонса',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'DETAIL_PICTURE'           =>
                array(
                    'NAME'          => 'Детальная картинка',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'SCALE'                   => 'N',
                            'WIDTH'                   => '',
                            'HEIGHT'                  => '',
                            'IGNORE_ERRORS'           => 'N',
                            'METHOD'                  => 'resample',
                            'COMPRESSION'             => 95,
                            'USE_WATERMARK_TEXT'      => 'N',
                            'WATERMARK_TEXT'          => '',
                            'WATERMARK_TEXT_FONT'     => '',
                            'WATERMARK_TEXT_COLOR'    => '',
                            'WATERMARK_TEXT_SIZE'     => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE'      => 'N',
                            'WATERMARK_FILE'          => '',
                            'WATERMARK_FILE_ALPHA'    => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER'    => null,
                        ),
                ),
            'DETAIL_TEXT_TYPE'         =>
                array(
                    'NAME'          => 'Тип детального описания',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ),
            'DETAIL_TEXT'              =>
                array(
                    'NAME'          => 'Детальное описание',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'XML_ID'                   =>
                array(
                    'NAME'          => 'Внешний код',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => '',
                ),
            'CODE'                     =>
                array(
                    'NAME'          => 'Символьный код',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'UNIQUE'          => 'N',
                            'TRANSLITERATION' => 'N',
                            'TRANS_LEN'       => 100,
                            'TRANS_CASE'      => 'L',
                            'TRANS_SPACE'     => '-',
                            'TRANS_OTHER'     => '-',
                            'TRANS_EAT'       => 'Y',
                            'USE_GOOGLE'      => 'N',
                        ),
                ),
            'TAGS'                     =>
                array(
                    'NAME'          => 'Теги',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'SECTION_NAME'             =>
                array(
                    'NAME'          => 'Название',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => '',
                ),
            'SECTION_PICTURE'          =>
                array(
                    'NAME'          => 'Картинка для анонса',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'FROM_DETAIL'             => 'N',
                            'SCALE'                   => 'N',
                            'WIDTH'                   => '',
                            'HEIGHT'                  => '',
                            'IGNORE_ERRORS'           => 'N',
                            'METHOD'                  => 'resample',
                            'COMPRESSION'             => 95,
                            'DELETE_WITH_DETAIL'      => 'N',
                            'UPDATE_WITH_DETAIL'      => 'N',
                            'USE_WATERMARK_TEXT'      => 'N',
                            'WATERMARK_TEXT'          => '',
                            'WATERMARK_TEXT_FONT'     => '',
                            'WATERMARK_TEXT_COLOR'    => '',
                            'WATERMARK_TEXT_SIZE'     => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE'      => 'N',
                            'WATERMARK_FILE'          => '',
                            'WATERMARK_FILE_ALPHA'    => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER'    => null,
                        ),
                ),
            'SECTION_DESCRIPTION_TYPE' =>
                array(
                    'NAME'          => 'Тип описания',
                    'IS_REQUIRED'   => 'Y',
                    'DEFAULT_VALUE' => 'text',
                ),
            'SECTION_DESCRIPTION'      =>
                array(
                    'NAME'          => 'Описание',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'SECTION_DETAIL_PICTURE'   =>
                array(
                    'NAME'          => 'Детальная картинка',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'SCALE'                   => 'N',
                            'WIDTH'                   => '',
                            'HEIGHT'                  => '',
                            'IGNORE_ERRORS'           => 'N',
                            'METHOD'                  => 'resample',
                            'COMPRESSION'             => 95,
                            'USE_WATERMARK_TEXT'      => 'N',
                            'WATERMARK_TEXT'          => '',
                            'WATERMARK_TEXT_FONT'     => '',
                            'WATERMARK_TEXT_COLOR'    => '',
                            'WATERMARK_TEXT_SIZE'     => '',
                            'WATERMARK_TEXT_POSITION' => 'tl',
                            'USE_WATERMARK_FILE'      => 'N',
                            'WATERMARK_FILE'          => '',
                            'WATERMARK_FILE_ALPHA'    => '',
                            'WATERMARK_FILE_POSITION' => 'tl',
                            'WATERMARK_FILE_ORDER'    => null,
                        ),
                ),
            'SECTION_XML_ID'           =>
                array(
                    'NAME'          => 'Внешний код',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' => '',
                ),
            'SECTION_CODE'             =>
                array(
                    'NAME'          => 'Символьный код',
                    'IS_REQUIRED'   => 'N',
                    'DEFAULT_VALUE' =>
                        array(
                            'UNIQUE'          => 'N',
                            'TRANSLITERATION' => 'N',
                            'TRANS_LEN'       => 100,
                            'TRANS_CASE'      => 'L',
                            'TRANS_SPACE'     => '-',
                            'TRANS_OTHER'     => '-',
                            'TRANS_EAT'       => 'Y',
                            'USE_GOOGLE'      => 'N',
                        ),
                ),
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME'               => 'Ссылка',
            'ACTIVE'             => 'Y',
            'SORT'               => '500',
            'CODE'               => 'LINK',
            'DEFAULT_VALUE'      => '',
            'PROPERTY_TYPE'      => 'S',
            'ROW_COUNT'          => '1',
            'COL_COUNT'          => '30',
            'LIST_TYPE'          => 'L',
            'MULTIPLE'           => 'N',
            'XML_ID'             => '',
            'FILE_TYPE'          => '',
            'MULTIPLE_CNT'       => '5',
            'LINK_IBLOCK_ID'     => '0',
            'WITH_DESCRIPTION'   => 'N',
            'SEARCHABLE'         => 'N',
            'FILTRABLE'          => 'N',
            'IS_REQUIRED'        => 'N',
            'VERSION'            => '1',
            'USER_TYPE'          => null,
            'USER_TYPE_SETTINGS' => null,
            'HINT'               => '',
        ));
        $helper->Iblock()->saveProperty($iblockId, array(
            'NAME'               => 'Категория',
            'ACTIVE'             => 'Y',
            'SORT'               => '500',
            'CODE'               => 'CATEGORY',
            'DEFAULT_VALUE'      => '',
            'PROPERTY_TYPE'      => 'S',
            'ROW_COUNT'          => '1',
            'COL_COUNT'          => '30',
            'LIST_TYPE'          => 'L',
            'MULTIPLE'           => 'N',
            'XML_ID'             => '',
            'FILE_TYPE'          => '',
            'MULTIPLE_CNT'       => '5',
            'LINK_IBLOCK_ID'     => '0',
            'WITH_DESCRIPTION'   => 'N',
            'SEARCHABLE'         => 'N',
            'FILTRABLE'          => 'N',
            'IS_REQUIRED'        => 'N',
            'VERSION'            => '1',
            'USER_TYPE'          => 'directory',
            'USER_TYPE_SETTINGS' =>
                array(
                    'size'       => 1,
                    'width'      => 0,
                    'group'      => 'N',
                    'multiple'   => 'N',
                    'TABLE_NAME' => 'categories',
                ),
            'HINT'               => '',
        ));
    }

    public function down()
    {
        $helper = new HelperManager();
        $helper->Iblock()->deleteIblockIfExists('news');
        $helper->Hlblock()->deleteHlblockIfExists('Categories');
    }
}
