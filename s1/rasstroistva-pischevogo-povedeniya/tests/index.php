<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тесты");

?>
<?//$APPLICATION->IncludeComponent(
//	"bitrix:news",
//	"publications",
//	Array(
//		"LIST_PAGE_REDIRECT" => "/healthy-nutrition/?IBLOCK_ID=10", // TODO. При слиянии подставить функцию по получению ID по коду
//		"ADD_ELEMENT_CHAIN" => "N",
//		"ADD_SECTIONS_CHAIN" => "Y",
//		"AJAX_MODE" => "N",
//		"AJAX_OPTION_ADDITIONAL" => "",
//		"AJAX_OPTION_HISTORY" => "N",
//		"AJAX_OPTION_JUMP" => "N",
//		"AJAX_OPTION_STYLE" => "Y",
//		"BROWSER_TITLE" => "-",
//		"CACHE_FILTER" => "N",
//		"CACHE_GROUPS" => "Y",
//		"CACHE_TIME" => "36000000",
//		"CACHE_TYPE" => "A",
//		"CHECK_DATES" => "Y",
//		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
//		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
//		"DETAIL_DISPLAY_TOP_PAGER" => "N",
//		"DETAIL_FIELD_CODE" => array("SHOW_COUNTER"),
//		"DETAIL_PAGER_SHOW_ALL" => "Y",
//		"DETAIL_PAGER_TEMPLATE" => "",
//		"DETAIL_PAGER_TITLE" => "Страница",
//		"DETAIL_PROPERTY_CODE" => array("",""),
//		"DETAIL_SET_CANONICAL_URL" => "N",
//		"DISPLAY_BOTTOM_PAGER" => "Y",
//		"DISPLAY_DATE" => "Y",
//		"DISPLAY_NAME" => "Y",
//		"DISPLAY_PICTURE" => "Y",
//		"DISPLAY_PREVIEW_TEXT" => "Y",
//		"DISPLAY_TOP_PAGER" => "N",
//		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
//		"IBLOCK_ID" => "10",
//		"IBLOCK_TYPE" => "tests",
//		"INCLUDE_IBLOCK_INTO_CHAIN" => "Y",
//		"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
//		"LIST_FIELD_CODE" => array("SHOW_COUNTER"),
//		"LIST_PROPERTY_CODE" => array("",""),
//		"MESSAGE_404" => "",
//		"META_DESCRIPTION" => "-",
//		"META_KEYWORDS" => "-",
//		"NEWS_COUNT" => "4",
//		"PAGER_BASE_LINK_ENABLE" => "N",
//		"PAGER_DESC_NUMBERING" => "N",
//		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
//		"PAGER_SHOW_ALL" => "N",
//		"PAGER_SHOW_ALWAYS" => "N",
//		"PAGER_TEMPLATE" => ".default",
//		"PAGER_TITLE" => "Новости",
//		"PREVIEW_TRUNCATE_LEN" => "",
//		"SEF_FOLDER" => "/tests/",
//		"SEF_MODE" => "Y",
//		"SEF_URL_TEMPLATES" => Array("detail"=>"#ELEMENT_CODE#/","tests"=>"","section"=>""),
//		"SET_LAST_MODIFIED" => "N",
//		"SET_STATUS_404" => "N",
//		"SET_TITLE" => "Y",
//		"SHOW_404" => "N",
//		"SORT_BY1" => "ACTIVE_FROM",
//		"SORT_BY2" => "SORT",
//		"SORT_ORDER1" => "DESC",
//		"SORT_ORDER2" => "ASC",
//		"STRICT_SECTION_CHECK" => "N",
//		"USE_CATEGORIES" => "N",
//		"USE_FILTER" => "N",
//		"USE_PERMISSIONS" => "N",
//		"USE_RATING" => "Y",
//		"USE_REVIEW" => "N",
//		"USE_RSS" => "N",
//		"USE_SEARCH" => "N",
//		"USE_SHARE" => "N",
//		"FILTER_NAME" => "arrFilter",
//		"USE_ELEMENT_COUNTER" => "Y",
//		"MAX_VOTE" => "1",
//		"VOTE_NAMES" => array("1"),
//		"INCLUDE_SUBSECTIONS" => "Y",
//	)
//);?>
<div class="container">
	<div class="p-main">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "zp", Array(
	"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
	"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
),
	false
);?>
	</div>
</div>
<?

$APPLICATION->IncludeComponent(
	"wms:wms.tests",
	"rpp",
	Array(
		"ID" => explode('/' ,$_SERVER['REQUEST_URI'])[2],
		"CACHE_TIME" => 36,
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("RPP","rpp_tests"),
		"PAGE_ID" => $arResult['ID'],
		"COUNT" => 15,
		"NAVIGATION" => true,
		"MAX_VOTE" => "1",
		"VOTE_NAMES" => array("1"),
	)
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>