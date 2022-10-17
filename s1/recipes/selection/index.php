<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Рецепты");
?>
<section>
	<div class="container">
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumbs", Array(
			"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
			"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
		),
			false
		);?>
	</div>
</section>
<section>
	<div class="container">
		<h1 class="mb-40">Подборка рецептов</h1>
	</div>
</section>

<? $APPLICATION->IncludeComponent(
	"wms:wms.smart.filter",
	".default",
	array(
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"FILTER_NAME" => 'arrFilter',
		"CACHE_TYPE" => "A",
		"SHOW_ELEMENT_COUNT" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_GROUPS" => "Y",
	),
	false
); ?>
<?php
if ($_REQUEST['ajax'] == 'Y') {
	$APPLICATION->RestartBuffer();
}
global $arrFilter;

if ($_GET['SORT'] === 'POPULAR') $sort = 'SHOW_COUNTER'; else $sort = 'ACTIVE_FROM';
?>
<? $APPLICATION->IncludeComponent(
	"wms:wms.recipes.items",
	"video",
	array(
		"AJAX_MODE" => "Y",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"COUNT" => 15,
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"PAGE" => "",
		"FILTER_NAME" => 'arrFilter',
		"SORT_BY1" => $sort,
		"SORT_BY2" => "RAND",
		"SORT_ORDER1" => "DESC",
		"SORT_ORDER2" => "DESC",
	)
);
//Все что дальше возможно потом пригодится, пока не нужно
/*?>

<? if ($_REQUEST['ajax'] == 'Y') die(); ?>

<? $APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/refactor/include/recipes/recipesItemsLast.php"
	)
); ?>

<? $APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/templates/refactor/include/recipes/banner-na-stranitse-retsepty.php"
	)
); ?>
<section>
	<div class="container">


<?
if (count($_GET) < 2) {

	global $arrFilter;
	$arrFilter["=PROPERTY_31"] = [0 => "37"];
	unset($arrFilter["PROPERTY_10"]);

	if ($APPLICATION->GetCurPage(false) !== '/'){
		$SORT_BY1 = 'RAND';
		$SORT_BY2 = 'RAND';
	} else {
		$SORT_BY1 = 'ACTIVE_FROM';
		$SORT_BY2 = 'SORT';
	}

	?>

<? $APPLICATION->IncludeComponent("bitrix:news.list", "recipes", array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",    // Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",    // Включить подгрузку стилей
		"CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",    // Учитывать права доступа
		"CACHE_TIME" => "36000000",    // Время кеширования (сек.)
		"CACHE_TYPE" => "N",    // Тип кеширования
		"CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
		"DISPLAY_DATE" => "N",    // Выводить дату элемента
		"DISPLAY_NAME" => "Y",    // Выводить название элемента
		"DISPLAY_PICTURE" => "N",    // Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",    // Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
		"FIELD_CODE" => array("SHOW_COUNTER"),
		"FILTER_NAME" => "arrFilter",    // Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
		"IBLOCK_TYPE" => "MAIN",
		"SECTION_ID" => 0, // пустота
		"SHOW_ALL_WO_SECTION" => "Y", //Показывать все элементы, если не указан раздел
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"NEWS_COUNT" => "6",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",    // Показывать элементы подразделов раздела
		"MEDIA_PROPERTY" => "",    // Свойство для отображения медиа
		"MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
		"PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
		"PAGER_TEMPLATE" => "editors-choice",    // Шаблон постраничной навигации
		"PAGER_TITLE" => "Загрузить еще",    // Название категорий
		"PARENT_SECTION" => "",    // ID раздела
		"PARENT_SECTION_CODE" => "main_recipes",    // Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(    // Свойства
			0 => "CATEGORIES",
			1 => "VIDEO",
			2 => "ARTICLE_TYPE",
		),
		"SEARCH_PAGE" => "/search/",    // Путь к странице поиска
		"SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",    // Устанавливать статус 404
		"SET_TITLE" => "N",    // Устанавливать заголовок страницы
		"SHOW_404" => "N",    // Показ специальной страницы
		"SLIDER_PROPERTY" => "",    // Свойство с изображениями для слайдера
		"SORT_BY1" => $SORT_BY1,    // Поле для первой сортировки новостей
		"SORT_BY2" => $SORT_BY2,    // Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
		"TEMPLATE_THEME" => "blue",    // Цветовая тема
		"USE_RATING" => "N",    // Разрешить голосование
		"USE_SHARE" => "N",    // Отображать панель соц. закладок
	),
		false
	); ?>

	<? global $arrFilter;
	$arrFilter["=PROPERTY_32"] = [0 => "38"];
	unset($arrFilter["=PROPERTY_31"]);
	?>

	<? $APPLICATION->IncludeComponent("bitrix:news.list", "recipes", array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",    // Формат показа даты
		"ADD_SECTIONS_CHAIN" => "N",    // Включать раздел в цепочку навигации
		"AJAX_MODE" => "N",    // Включить режим AJAX
		"AJAX_OPTION_ADDITIONAL" => "",    // Дополнительный идентификатор
		"AJAX_OPTION_HISTORY" => "N",    // Включить эмуляцию навигации браузера
		"AJAX_OPTION_JUMP" => "N",    // Включить прокрутку к началу компонента
		"AJAX_OPTION_STYLE" => "N",    // Включить подгрузку стилей
		"CACHE_FILTER" => "N",    // Кешировать при установленном фильтре
		"CACHE_GROUPS" => "N",    // Учитывать права доступа
		"CACHE_TIME" => "36000000",    // Время кеширования (сек.)
		"CACHE_TYPE" => "N",    // Тип кеширования
		"CHECK_DATES" => "Y",    // Показывать только активные на данный момент элементы
		"DETAIL_URL" => "",    // URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
		"DISPLAY_BOTTOM_PAGER" => "Y",    // Выводить под списком
		"DISPLAY_DATE" => "N",    // Выводить дату элемента
		"DISPLAY_NAME" => "Y",    // Выводить название элемента
		"DISPLAY_PICTURE" => "N",    // Выводить изображение для анонса
		"DISPLAY_PREVIEW_TEXT" => "N",    // Выводить текст анонса
		"DISPLAY_TOP_PAGER" => "N",    // Выводить над списком
		"FIELD_CODE" => array("SHOW_COUNTER"),
		"FILTER_NAME" => "arrFilter",    // Фильтр
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",    // Скрывать ссылку, если нет детального описания
		"IBLOCK_TYPE" => "MAIN",
		"SECTION_ID" => 0, // пустота
		"SHOW_ALL_WO_SECTION" => "Y", //Показывать все элементы, если не указан раздел
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition"),
		"NEWS_COUNT" => "6",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",    // Включать инфоблок в цепочку навигации
		"INCLUDE_SUBSECTIONS" => "N",    // Показывать элементы подразделов раздела
		"MEDIA_PROPERTY" => "",    // Свойство для отображения медиа
		"MESSAGE_404" => "",    // Сообщение для показа (по умолчанию из компонента)
		"PAGER_BASE_LINK_ENABLE" => "N",    // Включить обработку ссылок
		"PAGER_DESC_NUMBERING" => "N",    // Использовать обратную навигацию
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",    // Время кеширования страниц для обратной навигации
		"PAGER_SHOW_ALL" => "N",    // Показывать ссылку "Все"
		"PAGER_SHOW_ALWAYS" => "N",    // Выводить всегда
		"PAGER_TEMPLATE" => "recipes-from-the-nii",    // Шаблон постраничной навигации
		"PAGER_TITLE" => "Загрузить еще",    // Название категорий
		"PARENT_SECTION" => "",    // ID раздела
		"PARENT_SECTION_CODE" => "main_recipes",    // Код раздела
		"PREVIEW_TRUNCATE_LEN" => "",    // Максимальная длина анонса для вывода (только для типа текст)
		"PROPERTY_CODE" => array(    // Свойства
			0 => "CATEGORIES",
			1 => "VIDEO",
			2 => "ARTICLE_TYPE",
		),
		"SEARCH_PAGE" => "/search/",    // Путь к странице поиска
		"SET_BROWSER_TITLE" => "N",    // Устанавливать заголовок окна браузера
		"SET_LAST_MODIFIED" => "N",    // Устанавливать в заголовках ответа время модификации страницы
		"SET_META_DESCRIPTION" => "N",    // Устанавливать описание страницы
		"SET_META_KEYWORDS" => "N",    // Устанавливать ключевые слова страницы
		"SET_STATUS_404" => "N",    // Устанавливать статус 404
		"SET_TITLE" => "N",    // Устанавливать заголовок страницы
		"SHOW_404" => "N",    // Показ специальной страницы
		"SLIDER_PROPERTY" => "",    // Свойство с изображениями для слайдера
		"SORT_BY1" => $SORT_BY1,    // Поле для первой сортировки новостей
		"SORT_BY2" => $SORT_BY2,    // Поле для второй сортировки новостей
		"SORT_ORDER1" => "DESC",    // Направление для первой сортировки новостей
		"SORT_ORDER2" => "ASC",    // Направление для второй сортировки новостей
		"STRICT_SECTION_CHECK" => "N",    // Строгая проверка раздела для показа списка
		"TEMPLATE_THEME" => "blue",    // Цветовая тема
		"USE_RATING" => "N",    // Разрешить голосование
		"USE_SHARE" => "N",    // Отображать панель соц. закладок
	),
		false
	); ?>

<?php } ?>
	</div>
</section>

<? $APPLICATION->IncludeComponent(
	"wms:wms.lastArticles",
	"other",
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"BASE_URI" => "https://xn----8sbehgcimb3cfabqj3b.xn--p1ai/",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"COUNT" => "4",
		"PAGE" => "/api/news/list/",
		"HTTP_AUTH_LOGIN" => "",
		"HTTP_AUTH_PASSWORD" => "",
		"PARSE_TYPE" => "other",
	)
); */?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
