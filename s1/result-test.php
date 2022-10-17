<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetTitle("Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetPageProperty("description", "Самая актуальная информация по вопросам здорового питания, проверенная научными экспертами. Проект Роспотребнадзора «Здоровое питание» реализуется с 2019 г. в рамках нацпроекта «Демография» и федерального проекта «Укрепление общественного здоровья»."); ?>
<div class="container">

	<!-- TODO: breadcrumb битрикса -->
	<div class="bx-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
		<div class="bx-breadcrumb-item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope=""
			 itemtype="http://schema.org/ListItem">

			<a href="/" title="Главная" itemprop="item">
				<span itemprop="name">Главная</span>
			</a>
			<meta itemprop="position" content="1">
		</div>
		<div class="bx-breadcrumb-item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope=""
			 itemtype="http://schema.org/ListItem">
			<i class="fa fa-angle-right"></i>
			<a href="/" title="Главная" itemprop="item">
				<span itemprop="name">Школа здорового питания</span>
			</a>
			<meta itemprop="position" content="1">
		</div>
		<div class="bx-breadcrumb-item">
			<i class="fa fa-angle-right"></i>
			<span>Курс 1</span>
		</div>
	</div>

	<h2 class="mb-40 w-100">Урок 1. Здоровое питание: основные понятия</h2>
	<h3 class="w-100 mb-40">Результаты теста</h3>
	<div class="mainResultTest">
		<div class="text-gray w-100 mb-2">
			Дата завершения: 12.12.2021
		</div>
		<div class="text-gray w-100 mb-2">
			Потрачено времени: 00:01:36
		</div>
		<div class="w-100 bigBlackGreenText mb-40 pt-md-3 pt-2 mt-md-3 mt-2">
			3 <span>/5</span>
		</div>
		<p>
			Вы правильно ответили на большинство вопросов!
		</p>
		<p>
			Изучите материалы урока еще раз, чтобы улучшить свой
			результат.
		</p>
	</div>
	<div class="pt-4 row px-2 btnBottomPage row">
		<button type="button" class="btn btn-success mx-2 mt-3 w-auto">Следующий урок</button>
		<button type="button" class="btn btn-outline-success mx-2 mt-3 w-auto">Изучить материалы еще раз</button>
	</div>
</div>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
