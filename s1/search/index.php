<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>
<section>
	<div class="container">
<?$APPLICATION->IncludeComponent(
	"bitrix:search.page", 
	"all", 
	array(
		"TAGS_SORT" => "NAME",
		"TAGS_PAGE_ELEMENTS" => "150",
		"TAGS_PERIOD" => "30",
		"TAGS_URL_SEARCH" => "/search/index.php",
		"TAGS_INHERIT" => "Y",
		"FONT_MAX" => "50",
		"FONT_MIN" => "10",
		"COLOR_NEW" => "000000",
		"COLOR_OLD" => "C8C8C8",
		"PERIOD_NEW_TAGS" => "",
		"SHOW_CHAIN" => "Y",
		"COLOR_TYPE" => "Y",
		"WIDTH" => "100%",
		"USE_SUGGEST" => "Y",
		"SHOW_RATING" => "Y",
		"PATH_TO_USER_PROFILE" => "",
		"AJAX_MODE" => "N",
		"RESTART" => "Y",
		"NO_WORD_LOGIC" => "Y",
		"USE_LANGUAGE_GUESS" => "N",
		"CHECK_DATES" => "Y",
		"USE_TITLE_RANK" => "Y",
		"DEFAULT_SORT" => "rank",
		"FILTER_NAME" => "",
		"arrFILTER" => array(
			0 => "iblock_content_sections",
			1 => "iblock_SERVICES",
		),
		"SHOW_WHERE" => "N",
		"arrWHERE" => "",
		"SHOW_WHEN" => "Y",
		"PAGE_RESULT_COUNT" => "999",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600000",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"PAGER_TITLE" => "Результаты поиска",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "search_more",
		"COMPONENT_TEMPLATE" => "all",
		"arrFILTER_iblock_content_sections" => array(
			0 => "8",
			1 => "9",
			2 => "11",
			3 => "16",
			4 => "28",
			5 => "53",
			6 => "56",
		),
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"DISPLAY_TOP_PAGER" => "N",
		"arrFILTER_iblock_azbuka" => array(
			0 => "all",
		),
		"arrFILTER_iblock_recipes" => array(
			0 => "all",
		),
		"arrFILTER_iblock_help" => array(
			0 => "all",
		),
		"arrFILTER_iblock_SCHOOL" => array(
			0 => "all",
		),
		"arrFILTER_iblock_content" => array(
			0 => "all",
		),
		"arrFILTER_iblock_SERVICES" => array(
			0 => "50",
			1 => "51",
		),
		"arrFILTER_iblock_calculators" => array(
			0 => "all",
		)
	),
	false
);?>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
