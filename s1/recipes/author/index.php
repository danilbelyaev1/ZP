<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Авторы рецептов");
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
<?php
if ($_GET['SORT'] === 'POPULAR') $sort = 'POPULAR'; elseif ($_GET['SORT'] === 'ACTIVE') $sort = 'ACTIVE'; else $sort = 'NEW';
if(!is_numeric($_REQUEST["USER_ID"])) {
//    CHTTP::SetStatus("404 Not Found");
//    @define("ERROR_404","Y");
//    LocalRedirect('/404.php', false, 301);
	$APPLICATION->IncludeComponent(
		"wms:wms.users.list",
		"all_authors",
		Array(
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_TYPE" => "A",
			"COUNT" => "24",
			"IGROUP_ID" => "7",
			"NO_IGROUP_ID" => "1",
			"DETAIL_PAGER_SHOW_ALL" => "Y",    // Показывать ссылку "Все"
			"DETAIL_PAGER_TEMPLATE" => "authors",    // Шаблон постраничной навигации
			"DETAIL_PAGER_TITLE" => "Загрузить еще",    // Название категорий
			"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
			"DETAIL_DISPLAY_TOP_PAGER" => "N",
			"FILTER_NAME" => '',
			"SORT_BY1" => $sort,
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
		)
	);
	}else {

	$APPLICATION->IncludeComponent(
		"wms:wms.user.profile",
		"authors",
		Array(
			"AJAX_MODE" => "N",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "N",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "N",
			"CACHE_TIME" => "3600",
			"CACHE_TYPE" => "A",
			"IUSER_ID" => $_REQUEST["USER_ID"]
		)
	);
}?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
