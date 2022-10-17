<?
define('STOP_STATISTICS', true);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
//require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
//$APPLICATION->SetTitle("Новая страница");
$GLOBALS['APPLICATION']->RestartBuffer();
?>

<?
		$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"plate_ajax",
			array(
				"PARENT_SECTION_CODE" => 'spring',
				"ADD_ELEMENT_CHAIN" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "Y",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "Y",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"BROWSER_TITLE" => "-",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CHECK_DATES" => "Y",
				"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
				"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
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
					1 => "",
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
				"SEF_FOLDER" => "/plate/",
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
				"COMPONENT_TEMPLATE" => "plate",
				"SEF_URL_TEMPLATES" => array(
					"news" => "/plate/",
					"section" => "",
					"detail" => "#ELEMENT_CODE#/",
				)
			),
			false
		);?>
	</div>
</section>
<?
//require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
