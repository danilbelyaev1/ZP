<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Новости регионов  | Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetPageProperty("description",  "");
?>
<main>
	<section class="help-page">
		<div class="container">
			<nav aria-label="breadcrumb" class="breadcrumb-nav">
				<ul class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Главная</a></li>
					<li class="breadcrumb-item active" aria-current="page">Помощь потребителю</li>
				</ul>
			</nav>
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

			<h2 class="h1">Помощь потребителю</h2>
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
					<h2 class="title">Новости регионов</h2>

					<?$APPLICATION->IncludeComponent(
						"bitrix:main.include",
						"",
						Array(
							"AREA_FILE_SHOW" => "file",
							"AREA_FILE_SUFFIX" => "inc",
							"EDIT_TEMPLATE" => "",
							"PATH" => "/local/templates/refactor/include/help/news_regions.php"
						)
					);?>

				</div>

			</div>
		</div>
	</section>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
