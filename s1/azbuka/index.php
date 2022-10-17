<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Детям и родителям");
?>
<section class="azbuka-section mb-40">
<div class="container">
	<p class="p-main">
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "zp", Array(
			"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
			"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		),
		false
		);?>
	</p>
	<h2>Детям</h2>
	<div class="azbuka-game main-page">
		<div class="burger-btn">
			<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" clip-rule="evenodd" d="M27.6668 8.74359C27.6668 9.29588 27.2191 9.74359 26.6668 9.74359H5.3335C4.78121 9.74359 4.3335 9.29588 4.3335 8.74359C4.3335 8.19131 4.78121 7.74359 5.3335 7.74359H26.6668C27.2191 7.74359 27.6668 8.19131 27.6668 8.74359ZM27.6668 16.7436C27.6668 17.2959 27.2191 17.7436 26.6668 17.7436H5.3335C4.78121 17.7436 4.3335 17.2959 4.3335 16.7436C4.3335 16.1913 4.78121 15.7436 5.3335 15.7436H26.6668C27.2191 15.7436 27.6668 16.1913 27.6668 16.7436ZM26.6668 25.7436C27.2191 25.7436 27.6668 25.2959 27.6668 24.7436C27.6668 24.1913 27.2191 23.7436 26.6668 23.7436H5.3335C4.78121 23.7436 4.3335 24.1913 4.3335 24.7436C4.3335 25.2959 4.78121 25.7436 5.3335 25.7436H26.6668Z" fill="#2B3F6C"/>
			</svg>
		</div>
		<div class="burger-menu">
			<div class="close-burger">
				<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M22.0401 1.78424C22.4306 2.17476 22.4306 2.80793 22.0401 3.19845L3.18393 22.0546C2.79341 22.4452 2.16024 22.4452 1.76972 22.0546C1.3792 21.6641 1.3792 21.0309 1.76972 20.6404L20.6259 1.78424C21.0164 1.39372 21.6496 1.39372 22.0401 1.78424Z" fill="#2B3F6C"/>
					<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9599 21.784C21.5694 22.1745 20.9362 22.1745 20.5457 21.784L1.68949 2.9278C1.29897 2.53728 1.29897 1.90411 1.68949 1.51359C2.08001 1.12306 2.71318 1.12306 3.1037 1.51359L21.9599 20.3698C22.3504 20.7603 22.3504 21.3935 21.9599 21.784Z" fill="#2B3F6C"/>
				</svg>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"islandsList",
				array(
					"COMPONENT_TEMPLATE" => "islandsList",
					"IBLOCK_TYPE" => "azbuka",
					"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("azbuka","ostrova"),
					"SECTION_ID" => $_REQUEST["SECTION_ID"],
					"SECTION_CODE" => "",
					"COUNT_ELEMENTS" => "N",
					"COUNT_ELEMENTS_FILTER" => "CNT_ACTIVE",
					"TOP_DEPTH" => "2",
					"SECTION_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"SECTION_USER_FIELDS" => array(
						0 => "",
						1 => "",
					),
					"FILTER_NAME" => "sectionsFilter",
					"VIEW_MODE" => "LINE",
					"SHOW_PARENT_NAME" => "Y",
					"SECTION_URL" => "",
					"CACHE_TYPE" => "A",
					"CACHE_TIME" => "36000000",
					"CACHE_GROUPS" => "Y",
					"CACHE_FILTER" => "N",
					"ADD_SECTIONS_CHAIN" => "Y"
				),
				false
			);?>
		</div>
		<div class="fullscreen-btn">
			<div class="fs-false">
				<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.6875 3.49359H3.75C3.19687 3.49359 2.75 3.94047 2.75 4.49359V11.4936C2.75 11.7686 2.975 11.9936 3.25 11.9936H4.75C5.025 11.9936 5.25 11.7686 5.25 11.4936V5.99359H10.6875C10.9625 5.99359 11.1875 5.76859 11.1875 5.49359V3.99359C11.1875 3.71859 10.9625 3.49359 10.6875 3.49359ZM28.75 21.4936H27.25C26.975 21.4936 26.75 21.7186 26.75 21.9936V27.4936H21.3125C21.0375 27.4936 20.8125 27.7186 20.8125 27.9936V29.4936C20.8125 29.7686 21.0375 29.9936 21.3125 29.9936H28.25C28.8031 29.9936 29.25 29.5467 29.25 28.9936V21.9936C29.25 21.7186 29.025 21.4936 28.75 21.4936ZM10.6875 27.4936H5.25V21.9936C5.25 21.7186 5.025 21.4936 4.75 21.4936H3.25C2.975 21.4936 2.75 21.7186 2.75 21.9936V28.9936C2.75 29.5467 3.19687 29.9936 3.75 29.9936H10.6875C10.9625 29.9936 11.1875 29.7686 11.1875 29.4936V27.9936C11.1875 27.7186 10.9625 27.4936 10.6875 27.4936ZM28.25 3.49359H21.3125C21.0375 3.49359 20.8125 3.71859 20.8125 3.99359V5.49359C20.8125 5.76859 21.0375 5.99359 21.3125 5.99359H26.75V11.4936C26.75 11.7686 26.975 11.9936 27.25 11.9936H28.75C29.025 11.9936 29.25 11.7686 29.25 11.4936V4.49359C29.25 3.94047 28.8031 3.49359 28.25 3.49359Z" fill="#2B3F6C"/>
				</svg>
			</div>
			<div class="fs-true">
				<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M10.6875 3.49359H3.75C3.19687 3.49359 2.75 3.94047 2.75 4.49359V11.4936C2.75 11.7686 2.975 11.9936 3.25 11.9936H4.75C5.025 11.9936 5.25 11.7686 5.25 11.4936V5.99359H10.6875C10.9625 5.99359 11.1875 5.76859 11.1875 5.49359V3.99359C11.1875 3.71859 10.9625 3.49359 10.6875 3.49359ZM28.75 21.4936H27.25C26.975 21.4936 26.75 21.7186 26.75 21.9936V27.4936H21.3125C21.0375 27.4936 20.8125 27.7186 20.8125 27.9936V29.4936C20.8125 29.7686 21.0375 29.9936 21.3125 29.9936H28.25C28.8031 29.9936 29.25 29.5467 29.25 28.9936V21.9936C29.25 21.7186 29.025 21.4936 28.75 21.4936ZM10.6875 27.4936H5.25V21.9936C5.25 21.7186 5.025 21.4936 4.75 21.4936H3.25C2.975 21.4936 2.75 21.7186 2.75 21.9936V28.9936C2.75 29.5467 3.19687 29.9936 3.75 29.9936H10.6875C10.9625 29.9936 11.1875 29.7686 11.1875 29.4936V27.9936C11.1875 27.7186 10.9625 27.4936 10.6875 27.4936ZM28.25 3.49359H21.3125C21.0375 3.49359 20.8125 3.71859 20.8125 3.99359V5.49359C20.8125 5.76859 21.0375 5.99359 21.3125 5.99359H26.75V11.4936C26.75 11.7686 26.975 11.9936 27.25 11.9936H28.75C29.025 11.9936 29.25 11.7686 29.25 11.4936V4.49359C29.25 3.94047 28.8031 3.49359 28.25 3.49359Z" fill="#2B3F6C"/>
				</svg>
			</div>
		</div>
		<a href="testy-i-igry" class="test-and-games-btn">
			<div class="left">
				<img src="../layout/img/tests-btn.png" alt="">
			</div>
			<div class="right">
				Тесты <br>
				и игры
			</div>
		</a>
		<div class="boat">
			<div class="boat-route">
				<svg viewBox="0 0 947 525" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M121.871 460.289L84.042 451.452C57.1312 445.166 37.9948 421.311 37.6943 393.678L37.6156 386.448C37.5335 378.897 38.521 371.372 40.5488 364.097L45.3399 346.909C51.4248 325.08 44.6444 301.687 27.8292 286.496L12.4895 272.637C0.535836 261.838 -2.25695 244.159 5.7857 230.2C11.3906 220.473 13.2086 209.019 10.8915 198.034L7.71306 182.966C4.35182 167.031 13.2268 151.051 28.5307 145.482C48.1646 138.338 56.1565 114.867 44.9623 97.2259L37.1889 84.9756C30.4207 74.3095 28.5198 61.2641 31.9628 49.11L32.8983 45.8078C37.7649 28.6283 52.3466 15.9639 70.0383 13.5512C80.9102 12.0685 91.9488 14.6174 101.07 20.7167L104.063 22.7183C126.222 37.5359 154.723 39.0061 178.288 26.5471L189.29 20.7306C200.867 14.6101 214.242 12.8043 227.028 15.6355L233.334 17.032C248.874 20.4732 265.145 17.4285 278.39 8.60098C285.59 3.80169 294.05 1.24077 302.704 1.24085L321.124 1.24103C329.798 1.24111 338.415 2.65204 346.637 5.41856L368.821 12.8832C377.371 15.7604 386.46 16.6724 395.412 15.5513L421.11 12.3328C426.845 11.6146 432.653 11.7287 438.355 12.6715L474.283 18.6123C484.673 20.3303 494.23 25.3605 501.529 32.9529L511.218 43.0327C514.237 46.1731 518.405 47.948 522.761 47.948C523.969 47.948 525.174 47.8112 526.351 47.5402L535.241 45.4946C541.62 44.0266 547.717 41.5243 553.288 38.0872L556.772 35.938L579.387 22.1834C591.023 15.1056 604.722 12.1978 618.231 13.9378L636.531 16.295C641.479 16.9323 646.327 18.184 650.965 20.0213L670.514 27.766C683.825 33.0395 698.584 33.379 712.123 28.7233L726.042 23.9372C731.211 22.1598 736.599 21.097 742.056 20.7785L765.353 19.4184C787.223 18.1416 807.231 31.6924 814.161 52.4746C818.114 64.33 825.42 74.7849 835.193 82.5733L862.154 104.058L907.372 141.075C921.293 152.47 929.365 169.512 929.365 187.502V196.389C929.365 211.316 922.168 225.328 910.033 234.023L909.564 234.359C907.451 235.873 905.197 237.179 902.833 238.259C869.666 253.412 860.875 296.481 885.45 323.419L932.877 375.407C942.509 385.966 947.24 400.097 945.906 414.327C944.383 430.577 935.134 445.102 921.053 453.355L920.579 453.633C913.969 457.507 906.582 459.867 898.951 460.542L854.667 464.461C850.859 464.798 847.027 464.77 843.224 464.377L818.597 461.838C805.257 460.462 792.606 468.046 787.533 480.461C782.404 493.01 769.544 500.607 756.078 499.041L741.402 497.335C735.029 496.594 728.86 494.625 723.236 491.538L693.838 475.4L692.945 474.764C673.085 460.618 645.36 466.63 633.144 487.732C625.279 501.317 610.403 509.28 594.737 508.292L555.231 505.799C546.588 505.254 537.915 506.115 529.549 508.35L501.969 515.717L496.304 518.065C484.916 522.785 472.591 524.809 460.291 523.98L435.797 522.328C432.109 522.08 428.453 521.472 424.882 520.514L420.194 519.255C400.724 514.03 388.842 494.378 393.259 474.709C393.733 472.601 394.387 470.537 395.216 468.541L410.242 432.323L414.65 419.592C418.168 409.433 414.932 398.159 406.563 391.412C402.032 387.758 396.35 385.766 390.529 385.766C379.939 385.766 369.87 390.647 363.354 398.996L358.889 404.719L330.737 440.745L302.736 478.972C290.126 496.189 263.942 494.626 253.469 476.032C251.795 473.061 250.652 469.82 250.09 466.455L247.968 453.74C246.094 442.508 238.284 433.172 227.559 429.343C215.311 424.97 201.634 428.604 193.171 438.479L190.992 441.02C184.23 448.91 175.107 454.411 164.974 456.708L148.785 460.377C139.923 462.386 130.72 462.356 121.871 460.289Z" stroke="#97CDD9" stroke-width="1.5" stroke-dasharray="4 4"/>
				</svg>

			</div>
			<div class="mover-wrapper">
				<div class="mover">
					<img src="../layout/img/azbuka-game/boat.png" alt="">
					<div class="mover-menu">
						<a href="testy-i-igry">Тесты и игры</a>
					</div>
				</div>

			</div>

		</div>
		 <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH."/include/azbuka/island.php"
	)
);?>
		<?/*$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => SITE_TEMPLATE_PATH."/include/azbuka/island-detail.php"
			)
		);*/?>
	</div>
</div>
</section>



<section>
</section>
<section>
	<div class="container">
		<? $APPLICATION->IncludeComponent(
			"bitrix:news",
			"azbuka_parents",
			array(
				"OTHER_DETAIL_URL" => "/healthy-nutrition/articles/",
				"DETAIL_LINK" => "/healthy-nutrition/articles/?set_filter=y&arrFilter_444_4154364387=Y",
				"TITLE" => "Родителям",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"SEF_MODE" => "Y",
				"AJAX_MODE" => "Y",
				"IBLOCK_TYPE" => "content_sections",
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
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
					2 => "",
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
				"DETAIL_PAGER_SHOW_ALL" => "N",
				"STRICT_SECTION_CHECK" => "N",
				"SET_TITLE" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_ELEMENT_CHAIN" => "N",
				"SET_LAST_MODIFIED" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SET_STATUS_404" => "N",
				"SHOW_404" => "Y",
				"MESSAGE_404" => "",
				"PAGER_BASE_LINK" => "",
				"PAGER_PARAMS_NAME" => "arrPager",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"USE_PERMISSIONS" => "N",
				"GROUP_PERMISSIONS" => array(
					0 => "1",
				),
				"CACHE_TYPE" => "A",
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
					1 => "CATEGORY",
					2 => "",
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
				"SEF_FOLDER" => "/azbuka/",
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
				"COMPONENT_TEMPLATE" => "azbuka",
				"AJAX_OPTION_ADDITIONAL" => "",
				"FILE_404" => "",
				"SEF_URL_TEMPLATES" => array(
					"news" => "/",
					"section" => "rss/",
					"detail" => "#ELEMENT_ID#/",
				)
			),
			false
		); ?>
	</div>
</section>

<section>
	<div class="container" id="ajaxChange">
		<? $APPLICATION->IncludeComponent(
			"bitrix:news",
			"azbuka",
			array(
				"OTHER_DETAIL_URL" => "/partner-projects/",
				"WRAPPER_ID" => "PARTNERS",
				"SHOW_SECTION_TABS" => "Y",
				"DETAIL_LINK" => "/partner-projects/",
				"TITLE" => "Партнеры",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"SEF_MODE" => "Y",
				"AJAX_MODE" => "Y",
				"IBLOCK_TYPE" => "azbuka",
				"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("azbuka","a_partners"),
				"NEWS_COUNT" => "9",
				"USE_SEARCH" => "N",
				"USE_RSS" => "N",
				"USE_RATING" => "N",
				"USE_CATEGORIES" => "N",
				"USE_REVIEW" => "N",
				"USE_FILTER" => "N",
				"SORT_BY1" => "ACTIVE_FROM",
				"SORT_ORDER1" => "DESC",
				"SORT_BY2" => "SORT",
				"SORT_ORDER2" => "ASC",
				"CHECK_DATES" => "Y",
				"PREVIEW_TRUNCATE_LEN" => "",
				"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
				"LIST_FIELD_CODE" => array(
					0 => "ID",
					1 => "SHOW_COUNTER",
					2 => "",
				),
				"LIST_PROPERTY_CODE" => array(
					0 => "",
					1 => "DESCRIPTION",
					2 => "CATEGORY",
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
				"DETAIL_PAGER_SHOW_ALL" => "N",
				"STRICT_SECTION_CHECK" => "N",
				"SET_TITLE" => "N",
				"ADD_SECTIONS_CHAIN" => "N",
				"ADD_ELEMENT_CHAIN" => "N",
				"SET_LAST_MODIFIED" => "N",
				"PAGER_BASE_LINK_ENABLE" => "N",
				"SET_STATUS_404" => "N",
				"SHOW_404" => "N",
				"MESSAGE_404" => "",
				"PAGER_BASE_LINK" => "",
				"PAGER_PARAMS_NAME" => "arrPager",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"USE_PERMISSIONS" => "N",
				"GROUP_PERMISSIONS" => array(
					0 => "1",
				),
				"CACHE_TYPE" => "A",
				"CACHE_TIME" => "3600",
				"CACHE_FILTER" => "Y",
				"CACHE_GROUPS" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"PAGER_TITLE" => "Новости",
				"PAGER_SHOW_ALWAYS" => "Y",
				"PAGER_TEMPLATE" => "more_noajax",
				"PAGER_URL" => "partner-projects",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"FILTER_NAME" => "",
				"FILTER_FIELD_CODE" => array(
					0 => "",
					1 => "",
				),
				"FILTER_PROPERTY_CODE" => array(
					0 => "",
					1 => "CATEGORY",
					2 => "",
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
				"SEF_FOLDER" => "/azbuka/",
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
				"COMPONENT_TEMPLATE" => "azbuka",
				"AJAX_OPTION_ADDITIONAL" => "",
				"FILE_404" => "",
				"SEF_URL_TEMPLATES" => array(
					"news" => "/partner-projects/",
					"section" => "",
					"detail" => "/partner-projects/#ELEMENT_CODE#/",
				)
			),
			false
		); ?>
	</div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
