<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Территориальные Управления РПН по субъектам РФ  | Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetPageProperty("description",  "");
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
		<?$APPLICATION->IncludeComponent(
			"bitrix:main.include",
			"",
			Array(
				"AREA_FILE_SHOW" => "file",
				"AREA_FILE_SUFFIX" => "inc",
				"EDIT_TEMPLATE" => "",
				"PATH" => "/local/templates/refactor/include/help/helpMaps.php"
			)
		);?>

		<div class="row">
			<div class="side-bar">

				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/refactor/include/help/helpMenu.php"
					)
				);?>

			</div>

			<div class="side-content">
				<h4 class="mb-32">Территориальные Управления РПН по субъектам РФ</h4>
				<div class="static">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include",
					"",
					Array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "inc",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/templates/refactor/include/help/territorialnye-upravleniya-rpn-po-subektam-rf.php"
					)
				);?>
				</div>
			</div>

		</div>
	</div>
</section>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
