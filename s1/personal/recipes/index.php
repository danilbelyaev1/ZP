<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мои рецепты");
global $USER;
if (!$USER->IsAuthorized()) LocalRedirect('/auth/', '', 301);
$iblockId = \Local\Core\Assistant\Iblock\Iblock::getIdByCode('content_sections', 'healthy_nutrition');
$sectionId = \CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblockId, 'CODE' => 'recipes'))->Fetch()["ID"];
$recipesCount = 0;
$res = \CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => $iblockId, 'IBLOCK_SECTION_ID' => $sectionId, 'CREATED_BY' => $USER->GetId(), 'SHOW_NEW' => 'Y', 'ACTIVE' => 'Y'], 0, 0, ['ID', 'IBLOCK_ID']);
while ($arItem = $res -> GetNext())	{
	$recipesCount += 1;
}
?>

	<section>
		<div class="container">
			<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "zp", Array(
				"START_FROM" => "1",	// Номер пункта, начиная с которого будет построена навигационная цепочка
				"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
				"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
			),
				false
			);?>
		</div>
	</section>
	<section>
		<div class="container">
			<h1 class="mb-40">
				Личный кабинет
			</h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="badge-list bigSize scroll-mobile pb-md-3 pb-1 mb-md-4 mb-3" >
				<a href="/personal/" class="tag-elem badge bg-success-light text-dark badge-xl">Профиль</a>
				<a href="/personal/learning/" class="tag-elem badge bg-success-light text-dark badge-xl">Мое обучение</a>
				<a href="/personal/diary/"  class="tag-elem badge bg-success-light text-dark badge-xl">Дневник питания</a>
				<a href="/personal/recipes/"  class="all badge bg-success-light active text-dark badge-xl">Мои рецепты <sup class="ms-1"><?=$recipesCount ? $recipesCount : ''?></sup></a>
				<a href="/personal/favourites/"  class="tag-elem badge bg-success-light text-dark badge-xl">Избранное <sup class="ms-1"><?=\Local\Core\Assistant\HighLoadBlock\HighLoadBlock::getLikesCount()?></sup></a>
			</div>
		</div>
	</section>
<?$GLOBALS['RECIPES_LK'] = ["CREATED_USER_ID" => $USER->GetId(), "SHOW_NEW" => 'Y', 'SECTION_CODE' => 'recipes'];?>
<?$APPLICATION->IncludeComponent(
	"bitrix:news",
	"recipes-lk",
	array(
		"ADD_ELEMENT_CHAIN" => "Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"CHECK_DATES" => "Y",
		"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
		"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
		"DETAIL_DISPLAY_TOP_PAGER" => "N",
		"DETAIL_FIELD_CODE" => array(
			0 => "*"
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
		"FILTER_NAME" => "RECIPES_LK",
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
			1 => "*"
		),
		"LIST_PROPERTY_CODE" => array(
			0 => "*"
		),
		"MESSAGE_404" => "",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"NEWS_COUNT" => "100",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => "more",
		"PAGER_TITLE" => "Новости",
		"PREVIEW_TRUNCATE_LEN" => "",
		"SEF_FOLDER" => "/healthy-nutrition/recipes/",
		"SEF_MODE" => "Y",
		"SET_LAST_MODIFIED" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "Y",
		"SHOW_404" => "N",
		"SORT_BY1" => "ACTIVE_FROM",
		"SORT_BY2" => "SORT",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "ASC",
		"STRICT_SECTION_CHECK" => "Y",
		"USE_CATEGORIES" => "N",
		"USE_FILTER" => "Y",
		"USE_PERMISSIONS" => "N",
		"USE_RATING" => "N",
		"USE_REVIEW" => "N",
		"USE_RSS" => "N",
		"USE_SEARCH" => "N",
		"USE_SHARE" => "N",
		"COMPONENT_TEMPLATE" => "recipes-lk",
		"SEF_URL_TEMPLATES" => array(
			"news" => "",
			"section" => "",
			"detail" => "#ELEMENT_CODE#/",
		)
	),
	false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
