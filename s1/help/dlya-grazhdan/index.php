<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Единый консультационный центр  | Проект Роспотребнадзора РФ «Здоровое питание");
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
					<div class="wrapper" id="consulting-center">
						<h4 class="mb-32">Единый консультационный центр</h4>
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/local/templates/refactor/include/help/one_consulting_center.php"
							)
						);?>
					</div>
					<div class="wrapper" id="citizens-appeals">
						<p class="h4 mb-32">Обращения граждан</p>
						<p>Основные вопросы обращений, которые, как правило, направляются на рассмотрение в центральный
							аппарат
							Роспотребнадзора:</p>

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/local/templates/refactor/include/help/citizensAppeals.php"
							)
						);?>

					</div>
					<div class="wrapper" id="regulatory-framework">
						<p class="h4 mb-32">Нормативно-правовая база</p>

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/local/templates/refactor/include/help/regulatory_framework.php"
							)
						);?>

					</div>
					<div class="wrapper" id="recommendations-rospotrebnadzor">
						<p class="h4 mb-3">Методические рекомендации Роспотребнадзора</p>

						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							Array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/local/templates/refactor/include/help/assistance_to_consumers_methodological_recommend.php"
							)
						);?>

					</div>
					<div class="wrapper" id="sanitary-regulations">
						<p class="h4 mb-32">Обновленные санитарные правила и нормативы</p>
						<a class="btn btn-success" target="_blank" href="https://www.rospotrebnadzor.ru/about/info/news_time/news_details.php?ELEMENT_ID=17040">Читать на сайте Роспотребназдзора</a>
					</div>
				</div>

			</div>
		</div>
	</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
