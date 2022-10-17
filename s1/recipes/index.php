<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Рецепты");
//global $arrFilter;
//$arrFilter["SECTION_CODE"] = 'main_news';
$propertyList = \Local\Core\Assistant\Iblock\ElementProperty::getPropList(\Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"));

?>
<section>
	<div class="container">
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "zp", Array(
			"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		),
			false
		);?>
	</div>
</section>
<section>
<div class="container">
	<h1 class="h2 mb-40">Книга рецептов — готовим вместе</h1>
</div>
</section>
<?

$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH . "/include/recipes/banner.php"
	)
); ?>
<section>
	<div class="container">
		<hr class="d-none d-md-block mb-40 mt-0">
	</div>
</section>

<? $APPLICATION->IncludeComponent(
	"wms:wms.smart.filter",
	".default",
	array(
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"FILTER_NAME" => 'arrFilter',
		"CACHE_TYPE" => "A",
		"SHOW_ELEMENT_COUNT" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
	),
	false
); ?>
<section>
	<div class="container">
		<hr class="d-none d-md-block mb-40 mt-0">
	</div>
</section>
<?
/*TODO перевести рецепты на стандартный компонент, потом включить фильтр по тегам
$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH . "/include/filter.php"
	)
);*/?>
<div class="mb-5">
<?

$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/refactor/include/recipes/recipesItemsVideo.php"
	)
);?>
</div>
<section  class="w-100 mb-5">
	<div class="container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"TITLE" => 'Популярные рецепты',
				"LINK" => '/recipes/selection/',
				"PROPERTY_LIST" => $propertyList,
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/refactor/include/recipes/recipesFrontTop.php"
			)
		); ?>
	</div>
</section>
<section  class="w-100 mb-5">
	<div class="container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"TITLE" => 'Выбор редакции',
				"LINK" => '/recipes/selection/',
				"PROPERTY_LIST" => $propertyList,
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/refactor/include/recipes/recipesFrontRedacion.php"
			)
		); ?>
	</div>
</section>
<section class="w-100 mb-5">
	<div class="container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"TITLE" => 'Рецепты от ФИЦ питания и биотехнологии',
				"LINK" => '/recipes/selection/',
				"PROPERTY_LIST" => $propertyList,
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/refactor/include/recipes/recipesFrontNII.php"
			)
		); ?>
	</div>
</section>
<section class="ambassador-section">
	<div class="container">
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"ambassadors_recipes",
			array(
				"COMPONENT_TEMPLATE" => "ambassadors",
				"IBLOCK_TYPE" => "content_sections",
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('content_sections', 'ambassadors'),
				"NEWS_COUNT" => "4",
				"SORT_BY1" => "SORT",
				"SORT_ORDER1" => "ASC",
				"SORT_BY2" => "ID",
				"SORT_ORDER2" => "DESC",
				"FIELD_CODE" => array(
					"PREVIEW_PICTURE",
					"PREVIEW_TEXT",
				),
				"PROPERTY_CODE" => array(),
				"CHECK_DATES" => "N",
				"DETAIL_URL" => "",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "36000000",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"SET_TITLE" => "N",
				"SET_BROWSER_TITLE" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_LAST_MODIFIED" => "N",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"INCLUDE_SUBSECTIONS" => "Y",
				"PAGER_TEMPLATE" => ".default",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"PAGER_TITLE" => "Анонсы",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SET_STATUS_404" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => ""
			),
			false
		);
		?>
	</div>
</section>
<?
$arrFilter = [];
// Поменять на ОРМ, вывести, зависает
$APPLICATION->IncludeComponent(
	"wms:wms.users.list",
	"authors",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COUNT" => "10",
		"IGROUP_ID" => "7",
//		"NO_IGROUP_ID" => "1",
		"DETAIL_PAGER_SHOW_ALL" => "Y",	// Показывать ссылку "Все"
		"DETAIL_PAGER_TEMPLATE" => "authors",	// Шаблон постраничной навигации
		"DETAIL_PAGER_TITLE" => "Загрузить еще",	// Название категорий
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"FILTER_NAME" => '',
		"SORT_BY1" => "CREATED_DATE",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
	)
);

?>
<?/*$APPLICATION->IncludeComponent(
	"bitrix:news",
	"recipes",
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "SHOW_COUNTER",
			1 => "",
		),
		"DETAIL_PAGER_SHOW_ALL" => "Y",
		"DETAIL_PAGER_TEMPLATE" => "",
		"DETAIL_PAGER_TITLE" => "Страница",
		"DETAIL_PROPERTY_CODE" => array(
			0 => "",
			1 => "",
		),
		"DETAIL_SET_CANONICAL_URL" => "N",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"DISPLAY_DATE" => "Y",
		"DISPLAY_NAME" => "Y",
		"DISPLAY_PICTURE" => "Y",
		"DISPLAY_PREVIEW_TEXT" => "Y",
		"DISPLAY_TOP_PAGER" => "N",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "CATEGORY",
			2 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"IBLOCK_TYPE" => "content_sections",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "SHOW_COUNTER",
			1 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "*",
			2 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "18",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "more",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/healthy-nutrition/news/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "recipes",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "#SECTION_CODE#/",
			"detail" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		)
	),
	false
);*/?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
