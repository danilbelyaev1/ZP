<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Подберите программу питания");
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
		<h1 class="h2 mb-40">Программы питания</h1>
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
		"PATH" => SITE_TEMPLATE_PATH . "/include/programs/banner.php"
	)
); ?>
<section class="choose-program">
	<div class="container">
		<p class="h3 mb-40">Подберите программу питания</p>

		<?
		$APPLICATION->IncludeComponent(
			"bitrix:catalog.smart.filter",
			"programs",
			array(
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "Y",
				"CONVERT_CURRENCY" => "N",
				"DISPLAY_ELEMENT_COUNT" => "Y",
				"FILTER_NAME" => "arrFilter",
				"FILTER_VIEW_MODE" => "horizontal",
				"HIDE_NOT_AVAILABLE" => "N",
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("SERVICES","PROGRAMS"),
				"IBLOCK_TYPE" => "SERVICES",
				"PAGER_PARAMS_NAME" => "arrPager",
				"POPUP_POSITION" => "left",
				"PREFILTER_NAME" => "smartPreFilter",
				"SAVE_IN_SESSION" => "N",
				"INSTANT_RELOAD" => "Y",
				"SECTION_CODE" => "",
				"SECTION_CODE_PATH" => "/programs/list/",
				"SECTION_DESCRIPTION" => "-",
				"SECTION_ID" => "",
				"SECTION_TITLE" => "-",
				"SEF_MODE" => "N",
				"SEF_RULE" => "/programs/list/filter/#SMART_FILTER_PATH#/apply/",
				"SMART_FILTER_PATH" => $_REQUEST["SMART_FILTER_PATH"],
				"TEMPLATE_THEME" => "white",
				"XML_EXPORT" => "N",
				"SHOW_ALL_WO_SECTION" => "Y",
				"COMPONENT_TEMPLATE" => "programs"
			),
			$component
		);
		?>
	</div>
</section>


<section class="section">
	<div class="container">
	 <?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"plate_ajax",
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "Y",
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "Y",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "SHOW_COUNTER",
			1 => "*",
			2 => "",
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
		"FILE_404" => "",
		"FILTER_FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "arrFilter",
		"FILTER_PROPERTY_CODE" => array(
			0 => "",
			1 => "EXPECTEDEFFECT",
			2 => "PERIOD",
			3 => "TYPEOFFOOD",
			4 => "ACTIVITYLEVEL",
			5 => "",
		),
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("SERVICES","plate"),
		"IBLOCK_TYPE" => "SERVICES",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"LIST_FIELD_CODE" => array(
			0 => "SHOW_COUNTER",
			1 => "*",
			2 => "",
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "",
			1 => "CALORIES",
			2 => "",
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "6",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "authors",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/programs/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "Y",
		"SET_TITLE" => "Y",
		"SHOW_404" => "Y",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "N",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "N",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "plate_ajax",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#SITE_DIR#/plate/#ELEMENT_CODE#/",
		)
	),
	false
);?>
</div>
 </section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
