<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Помощь потребителю | Проект Роспотребнадзора «Здоровое питание");
$APPLICATION->SetPageProperty("description", "");
?>
<section class="help-page">
	<div class="container">
		<div class="bx-breadcrumb" >
			<div class="bx-breadcrumb-item" >
				<a href="/" title="Главная" itemprop="item">
					<span>Главная</span>
				</a>
			</div>
		</div>
		<h1 class="h2 mb-40">Помощь потребителю</h1>
		<? $APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/refactor/include/help/helpMaps.php"
			)
		); ?>



		<? $APPLICATION->IncludeComponent(
			"bitrix:menu",
			"helpFront",
			array(
				"ALLOW_MULTI_SELECT" => "N",
				"CHILD_MENU_TYPE" => "left",
				"DELAY" => "N",
				"MAX_LEVEL" => "1",
				"MENU_CACHE_GET_VARS" => array(""),
				"MENU_CACHE_TIME" => "3600",
				"MENU_CACHE_TYPE" => "N",
				"MENU_CACHE_USE_GROUPS" => "N",
				"ROOT_MENU_TYPE" => "helpFront",
				"USE_EXT" => "N"
			)
		); ?>

	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
