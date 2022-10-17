<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Расстройства пищевого поведения");
//global $USER;
//if (!$USER->IsAdmin()) die();
?>

<section class="food-section">
	<div class="container">
		<h2 class="mb-4">Интерактивный раздел</h2>
		<?$APPLICATION->IncludeComponent(
			"wms:wms.game.main",
			"",
			Array()
		);?>
	</div>
</section>
<!--		Тесты-->
<section class="tests">
	<div class="container">
		<?

		$APPLICATION->IncludeComponent(
			"wms:wms.tests",
			"rpp",
			Array(
				"ID" => explode('/' ,$_SERVER['REQUEST_URI'])[2],
				"CACHE_TIME" => 36,
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("RPP","rpp_tests"),
				"PAGE_ID" => $arResult['ID'],
				"COUNT" => 6,
				"NAVIGATION" => false,
				"MAX_VOTE" => "1",
				"VOTE_NAMES" => array("1"),
			)
		);?>
	</div>
</section>
<section class="questions-section">
	<div class="container">
		<div class="questions-box">
			<img class="questions-box__ic" src="/layout/img/punctuation-marks.svg" alt="">
			<div class="text-wrapper">
				<p class="questions-box__text">Возникли вопросы, связанные с расстройством пищевого поведения? Заполни форму и получи ответ от нашего специалиста.</p>
				<button type="button"
						class="btn btn-success"
						data-bs-toggle="modal"
						data-bs-target="#askQuestionModal"
				>Задать вопрос</button>
			</div>
			<img class="questions-box__ic" src="/layout/img/fork-knife-plate.svg" alt="">
		</div>
	</div>
</section>
<div class="container">
	<h2 class="mb-4 mt-4">Что нужно знать о здоровом питании без расстройств пищевого поведения?</h2>
</div>

<!--		Игра-->

<!--		Статьи + Видео-->
<div class="container">
	<?
	global $arrFilter;
	$arrFilter["PROPERTY_CATEGORY_VALUE"] = "РПП";
	$APPLICATION->IncludeComponent(
		"bitrix:news",
		"rpp",
		array(
			"SECTION_CODE" => "news",
			"DISPLAY_DATE" => "Y",
			"DISPLAY_PICTURE" => "Y",
			"DISPLAY_PREVIEW_TEXT" => "Y",
			"SEF_MODE" => "Y",
			"AJAX_MODE" => "Y",
			"IBLOCK_TYPE" => "content_sections",
			"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections", "healthy_nutrition"),
			"NEWS_COUNT" => "9",
			"USE_SEARCH" => "N",
			"USE_RSS" => "N",
			"USE_RATING" => "N",
			"USE_CATEGORIES" => "N",
			"USE_REVIEW" => "N",
			"USE_FILTER" => "Y",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_ORDER1" => "DESC",
			"SORT_BY2" => "SORT",
			"SORT_ORDER2" => "ASC",
			"CHECK_DATES" => "Y",
			"PREVIEW_TRUNCATE_LEN" => "",
			"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"LIST_FIELD_CODE" => array(
				0 => "SHOW_COUNTER",
				1 => "",
			),
			"LIST_PROPERTY_CODE" => array(
				0 => "",
				1 => "CATEGORY",
				2 => "REGION",
				3 => "",
			),
			"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
			"DISPLAY_NAME" => "Y",
			"META_KEYWORDS" => "-",
			"META_DESCRIPTION" => "-",
			"BROWSER_TITLE" => "-",
			"DETAIL_SET_CANONICAL_URL" => "Y",
			"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"DETAIL_FIELD_CODE" => array(
				0 => "SHOW_COUNTER",
				1 => "",
			),
			"DETAIL_PROPERTY_CODE" => array(
				0 => "",
				1 => "",
			),
			"DETAIL_DISPLAY_TOP_PAGER" => "N",
			"DETAIL_DISPLAY_BOTTOM_PAGER" => "N",
			"DETAIL_PAGER_TITLE" => "Страница",
			"DETAIL_PAGER_TEMPLATE" => "",
			"DETAIL_PAGER_SHOW_ALL" => "Y",
			"STRICT_SECTION_CHECK" => "Y",
			"SET_TITLE" => "N",
			"ADD_SECTIONS_CHAIN" => "N",
			"ADD_ELEMENT_CHAIN" => "N",
			"SET_LAST_MODIFIED" => "N",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"SET_STATUS_404" => "Y",
			"SHOW_404" => "Y",
			"MESSAGE_404" => "",
			"PAGER_BASE_LINK" => "",
			"PAGER_PARAMS_NAME" => "arrPager",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"USE_PERMISSIONS" => "Y",
			"GROUP_PERMISSIONS" => array(
				0 => "1",
			),
			"CACHE_TYPE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_FILTER" => "Y",
			"CACHE_GROUPS" => "Y",
			"DISPLAY_TOP_PAGER" => "N",
			"DISPLAY_BOTTOM_PAGER" => "Y",
			"PAGER_TITLE" => "Новости",
			"PAGER_SHOW_ALWAYS" => "Y",
			"PAGER_TEMPLATE" => "more_noajax",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"FILTER_NAME" => "arrFilter",
			"FILTER_FIELD_CODE" => array(
				0 => "",
				1 => "",
			),
			"FILTER_PROPERTY_CODE" => array(
				0 => "",
				1 => "REGION",
				2 => "CATEGORY",
				3 => "",
			),
			"NUM_NEWS" => "20",
			"NUM_DAYS" => "30",
			"YANDEX" => "Y",
			"MAX_VOTE" => "5",
			"VOTE_NAMES" => array(
				0 => "0",
				1 => "1",
				2 => "2",
				3 => "3",
				4 => "4",
			),
			"CATEGORY_IBLOCK" => "",
			"CATEGORY_CODE" => "CATEGORY",
			"CATEGORY_ITEMS_COUNT" => "5",
			"MESSAGES_PER_PAGE" => "10",
			"USE_CAPTCHA" => "Y",
			"REVIEW_AJAX_POST" => "Y",
			"PATH_TO_SMILE" => "/bitrix/images/forum/smile/",
			"FORUM_ID" => "1",
			"URL_TEMPLATES_READ" => "",
			"SHOW_LINK_TO_FORUM" => "Y",
			"POST_FIRST_MESSAGE" => "Y",
			"SEF_FOLDER" => "/rasstroistva-pischevogo-povedeniya/",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"AJAX_OPTION_HISTORY" => "Y",
			"USE_SHARE" => "Y",
			"SHARE_HIDE" => "Y",
			"SHARE_TEMPLATE" => "",
			"SHARE_HANDLERS" => array(
				0 => "delicious",
				1 => "lj",
				2 => "twitter",
			),
			"SHARE_SHORTEN_URL_LOGIN" => "",
			"SHARE_SHORTEN_URL_KEY" => "",
			"COMPONENT_TEMPLATE" => "homepage",
			"AJAX_OPTION_ADDITIONAL" => "",
			"FILE_404" => "",
			"TEMPLATE_THEME" => "blue",
			"MEDIA_PROPERTY" => "",
			"SLIDER_PROPERTY" => "",
			"LIST_USE_SHARE" => "N",
			"SEF_URL_TEMPLATES" => array(
				"news" => "",
				"section" => "",
				"detail" => "#ELEMENT_CODE#/",
			)
		),
		false
	); ?>
</div>

<!--		Эксперты-->
<section class="expert-section">
	<div class="container">
		<?
		$APPLICATION->IncludeComponent(
			"bitrix:news.list",
			"experts",
			array(
				"ACTIVE_DATE_FORMAT" => "d.m.Y",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "N",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "A",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "N",
				"DISPLAY_DATE" => "N",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"FILTER_NAME" => "",
				"HIDE_LINK_WHEN_NO_DETAIL" => "Y",
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections", "experts"),
				"IBLOCK_TYPE" => "content",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"INCLUDE_SUBSECTIONS" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => "9",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TEMPLATE" => ".default",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION" => "",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"PROPERTY_CODE" => array(
					0 => "",
					1 => "",
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "SORT",
				"SORT_BY2" => "ACTIVE_FROM",
				"SORT_ORDER1" => "ASC",
				"SORT_ORDER2" => "DESC",
				"STRICT_SECTION_CHECK" => "N",
				"COMPONENT_TEMPLATE" => "experts"
			),
			false
		);
		?>
	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
