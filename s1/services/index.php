<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Сервисы");
?>

<section class="w-100 mb-5">
	<div class="container">
		<h1 class="h2 mb-40">Сервисы</h1>
		<div class="card-service-wrapper">
			<a href="/services/karta-pitanya/" class="card-service x-3">
				<span class="card-service__title">Карта питания России</span>
				<span class="card-service__text">Узнай чем питаются регионы</span>
				<span  class="btn btn-success">Перейти</span>
				<img class="card-service__img" src="/layout/img/services-img1.svg" alt="Карта питания России">
			</a>

			<a href="/services/calculators/" class="card-service">
				<span class="card-service__title">Наши калькуляторы</span>
				<span class="card-service__text">Рассчитайте калорийность своего рецепта, суточную норму, ИМТ и многое другое</span>
				<span  class="btn btn-success">Перейти</span>
				<img class="card-service__img" src="/layout/img/services-img2.svg" alt="калькулятор">
			</a>
			<a href="/services/sprosite-eksperta/" class="card-service">
				<span class="card-service__title">Спросите эксперта о здоровом питании</span>
				<span class="card-service__text">100 вопросов и ответов о здоровом питании</span>
				<span  class="btn btn-success">Узнать больше</span>
				<img class="card-service__img" src="/layout/img/services-img3.svg" alt="Спросите эксперта">
			</a>
			<a href="/programs/" class="card-service">
				<span class="card-service__title">Создайте свой дневник питания</span>
				<span class="card-service__text">И соблюдайте план, соответственно выбранной программе</span>
				<span  class="btn btn-success">Выбрать программу</span>
				<img class="card-service__img" src="/layout/img/services-img4.svg" alt="Дневник">
			</a>

			<a href="/services/tests/" class="card-service">
				<span class="card-service__title">Пройдите тесты</span>
				<span class="card-service__text">Пройдите тесты и узнайте насколько правильно вы питаетесь</span>
				<span class="btn btn-success">Перейти</span>
				<img class="card-service__img" src="/layout/img/services-img5.svg" alt="Тесты">
			</a>
			<a href="/services/trainings/" class="card-service">
				<span class="card-service__title">Подберите тренировку</span>
				<span class="card-service__text">Программы занятий на каждый день</span>
				<span class="btn btn-success">Подобрать</span>
				<img class="card-service__img" src="/layout/img/services-img6.svg" alt="Тренировка">
			</a>
			<a href="/services/composition/" class="card-service">
				<span class="card-service__title">О составе продуктов питания</span>
				<span class="card-service__text">Узнайте больше о полезных веществах и микроэлементах</span>
				<span class="btn btn-success">Узнать больше</span>
				<img class="card-service__img" src="/layout/img/services-img7.svg" alt="Составе">
			</a>
		</div>
	</div>
</section>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
