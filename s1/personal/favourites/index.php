<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Избранное");
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
			<a href="/personal/recipes/"  class="tag-elem badge bg-success-light text-dark badge-xl">Мои рецепты <sup class="ms-1"><?=$recipesCount ? $recipesCount : ''?></sup></a>
			<a href="/personal/favourites/"  class="all badge bg-success-light active text-dark badge-xl">Избранное <sup class="ms-1"><?=\Local\Core\Assistant\HighLoadBlock\HighLoadBlock::getLikesCount()?></sup></a>
		</div>
	</div>
</section>
<?$APPLICATION->IncludeComponent(
	"wms:wms.favourites",
	"page",
	Array(
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
	)
);?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
