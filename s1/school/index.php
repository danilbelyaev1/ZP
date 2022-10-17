<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("TITLE", "Школа здорового питания | Проект Роспотребнадзора «Здоровое питание»");
$APPLICATION->SetPageProperty("description", "Бесплатные видеоуроки для взрослых и детей, созданные под редакцией экспертов Роспотребнадзора и ФГБУН «ФИЦ питания и биотехнологии».");
$APPLICATION->SetTitle("Школа");?>

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
		<h1 class="h2 mb-40">Школа здорового питания</h1>
	</div>
</section>

<?
$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH . "/include/school/banner.php"
	)
);
?>

<?/*
$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => SITE_TEMPLATE_PATH . "/include/school/notification.php"
	)
);*/
?>

<?$APPLICATION->IncludeComponent("bitrix:news.list", "lessonsFront", Array(
	"ACTIVE_DATE_FORMAT" => "d.m.Y",	// Формат показа даты
	"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
	"AJAX_MODE" => "N",	// Включить режим AJAX
	"AJAX_OPTION_ADDITIONAL" => "",	// Дополнительный идентификатор
	"AJAX_OPTION_HISTORY" => "N",	// Включить эмуляцию навигации браузера
	"AJAX_OPTION_JUMP" => "N",	// Включить прокрутку к началу компонента
	"AJAX_OPTION_STYLE" => "N",	// Включить подгрузку стилей
	"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
	"CACHE_GROUPS" => "N",	// Учитывать права доступа
	"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
	"CACHE_TYPE" => "N",	// Тип кеширования
	"CHECK_DATES" => "Y",	// Показывать только активные на данный момент элементы
	"DETAIL_URL" => "",	// URL страницы детального просмотра (по умолчанию - из настроек инфоблока)
	"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
	"DISPLAY_DATE" => "Y",	// Выводить дату элемента
	"DISPLAY_NAME" => "Y",	// Выводить название элемента
	"DISPLAY_PICTURE" => "Y",	// Выводить изображение для анонса
	"DISPLAY_PREVIEW_TEXT" => "Y",	// Выводить текст анонса
	"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
	"FIELD_CODE" => array(	// Поля
		0 => "SHOW_COUNTER",
		1 => "",
	),
	"FILTER_NAME" => "",	// Фильтр
	"HIDE_LINK_WHEN_NO_DETAIL" => "N",	// Скрывать ссылку, если нет детального описания
	"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('school', 'courses_and_lessons'),	// Код информационного блока
	"IBLOCK_TYPE" => "school",	// Тип информационного блока (используется только для проверки)
	"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
	"INCLUDE_SUBSECTIONS" => "Y",	// Показывать элементы подразделов раздела
	"MESSAGE_404" => "",	// Сообщение для показа (по умолчанию из компонента)
	"NEWS_COUNT" => "500",	// Количество новостей на странице
	"PAGER_BASE_LINK_ENABLE" => "N",	// Включить обработку ссылок
	"PAGER_DESC_NUMBERING" => "N",	// Использовать обратную навигацию
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",	// Время кеширования страниц для обратной навигации
	"PAGER_SHOW_ALL" => "N",	// Показывать ссылку "Все"
	"PAGER_SHOW_ALWAYS" => "N",	// Выводить всегда
	"PAGER_TEMPLATE" => ".default",	// Шаблон постраничной навигации
	"PAGER_TITLE" => "Новости",	// Название категорий
	"PARENT_SECTION" => "",	// ID раздела
	"PARENT_SECTION_CODE" => "",	// Код раздела
	"PREVIEW_TRUNCATE_LEN" => "",	// Максимальная длина анонса для вывода (только для типа текст)
	"PROPERTY_CODE" => array(	// Свойства
		0 => "NUMBER_LESSONS",
		1 => "FORUM_MESSAGE_CNT",
	),
	"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
	"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
	"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
	"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
	"SET_STATUS_404" => "N",	// Устанавливать статус 404
	"SET_TITLE" => "N",	// Устанавливать заголовок страницы
	"SHOW_404" => "N",	// Показ специальной страницы
	"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
	"SORT_BY2" => "ACTIVE_DATE",	// Поле для второй сортировки новостей
	"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
	"SORT_ORDER2" => "DESC",	// Направление для второй сортировки новостей
	"STRICT_SECTION_CHECK" => "N",	// Строгая проверка раздела для показа списка
),
	false
);?>
<section>
	<div class="container d-flex flex-wrap align-items-end justify-content-between w-100 pb-md-4 pb-2">
		<h3 class="h3 col-md col-12 mb-4">Рекомендации экспертов</h3>
		<a class="paragraph mb-3 ms-0 ms-md-4" href="/school/video_from_experts/">Подробнее</a>
	</div>
</section>

<section>
	<?$APPLICATION->IncludeComponent(
		"bitrix:news",
		"experts",
		array(
			"ADD_ELEMENT_CHAIN" => "Y",
			"ADD_SECTIONS_CHAIN" => "N",
			"AJAX_MODE" => "Y",
			"AJAX_OPTION_ADDITIONAL" => "",
			"AJAX_OPTION_HISTORY" => "Y",
			"AJAX_OPTION_JUMP" => "N",
			"AJAX_OPTION_STYLE" => "Y",
			"BROWSER_TITLE" => "-",
			"CACHE_FILTER" => "N",
			"CACHE_GROUPS" => "N",
			"CACHE_TIME" => "36000000",
			"CACHE_TYPE" => "N",
			"CHECK_DATES" => "Y",
			"DETAIL_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"DETAIL_DISPLAY_BOTTOM_PAGER" => "Y",
			"DETAIL_DISPLAY_TOP_PAGER" => "N",
			"DETAIL_FIELD_CODE" => array(
				0 => "SHOW_COUNTER",
				1 => "",
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
			"FILTER_NAME" => "",
			"FILTER_PROPERTY_CODE" => array(
				0 => "",
				1 => "CATEGORY",
				2 => "",
			),
			"HIDE_LINK_WHEN_NO_DETAIL" => "N",
			"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("school","VIDEO_FROM_EXPERTS"),
			"IBLOCK_TYPE" => "MAIN",
			"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
			"LIST_ACTIVE_DATE_FORMAT" => "d.m.Y",
			"LIST_FIELD_CODE" => array(
				0 => "SHOW_COUNTER",
				1 => "",
			),
			"LIST_PROPERTY_CODE" => array(
				0 => "",
				1 => "CATEGORY",
				2 => "*",
				3 => "",
			),
			"MESSAGE_404" => "",
			"META_DESCRIPTION" => "-",
			"META_KEYWORDS" => "-",
			"NEWS_COUNT" => "4",
			"PAGER_BASE_LINK_ENABLE" => "N",
			"PAGER_DESC_NUMBERING" => "N",
			"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
			"PAGER_SHOW_ALL" => "N",
			"PAGER_SHOW_ALWAYS" => "N",
			"PAGER_TEMPLATE" => "more",
			"PAGER_TITLE" => "Эксперты",
			"PREVIEW_TRUNCATE_LEN" => "",
			"SEF_FOLDER" => "/school/video_from_experts/",
			"SEF_MODE" => "Y",
			"SET_LAST_MODIFIED" => "N",
			"SET_STATUS_404" => "N",
			"SET_TITLE" => "Y",
			"SHOW_404" => "N",
			"SORT_BY1" => "ACTIVE_FROM",
			"SORT_BY2" => "SORT",
			"SORT_ORDER1" => "DESC",
			"SORT_ORDER2" => "ASC",
			"STRICT_SECTION_CHECK" => "N",
			"USE_CATEGORIES" => "N",
			"USE_FILTER" => "Y",
			"USE_PERMISSIONS" => "N",
			"USE_RATING" => "N",
			"USE_REVIEW" => "N",
			"USE_RSS" => "N",
			"USE_SEARCH" => "N",
			"USE_SHARE" => "N",
			"COMPONENT_TEMPLATE" => "experts",
			"SEF_URL_TEMPLATES" => array(
				"news" => "",
				"section" => "#SECTION_CODE#/",
				"detail" => "#ELEMENT_CODE#/",
			)
		),
		false
	);?>
</section>

<script>
	setInterval(() => {
		if (document.querySelector('.title-news-list'))	{
			document.querySelector('.title-news-list').remove();
		}
	}, 1000)
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
