<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetPageProperty("keywords", "Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetTitle("Проект Роспотребнадзора РФ «Здоровое питание»");
$APPLICATION->SetPageProperty("description", "Самая актуальная информация по вопросам здорового питания, проверенная научными экспертами. Проект Роспотребнадзора «Здоровое питание» реализуется с 2019 г. в рамках нацпроекта «Демография» и федерального проекта «Укрепление общественного здоровья»."); ?>
<section class="w-100 mb-5">
    <div class="container">
        <h1 class="mb-40">Сервисы</h1>
        <div class="card-service-wrapper">
            <div class="card-service x-3">
                <p class="card-service__title">Карта питания России</p>
                <p class="card-service__text">Узнай чем питаются регионы</p>
                <a href="#" class="btn btn-success">Перейти</a>
                <img class="card-service__img" src="/layout/img/services-img1.svg" alt="Карта питания России">
            </div>

            <div class="card-service">
                <p class="card-service__title">Наши калькуляторы</p>
                <p class="card-service__text">Рассчитайте калорийность своего рецепта, суточную норму, ИМТ и многое другое</p>
                <a href="#" class="btn btn-success">Перейти</a>
                <img class="card-service__img" src="/layout/img/services-img2.svg" alt="калькулятор">
            </div>
            <div class="card-service">
                <p class="card-service__title">Спросите эксперта о здоровом питании</p>
                <p class="card-service__text">100 вопросов и ответов о здоровом питании</p>
                <a href="#" class="btn btn-success">Узнать больше</a>
                <img class="card-service__img" src="/layout/img/services-img3.svg" alt="Спросите эксперта">
            </div>
            <div class="card-service">
                <p class="card-service__title">Создайте свой дневник питания</p>
                <p class="card-service__text">И соблюдайте план, соответственно выбранной программе</p>
                <a href="#" class="btn btn-success">Выбрать программу</a>
                <img class="card-service__img" src="/layout/img/services-img4.svg" alt="Дневник">
            </div>

            <div class="card-service">
                <p class="card-service__title">Пройдите тесты</p>
                <p class="card-service__text">Пройдите тесты и узнайте насколько правильно вы питаетесь</p>
                <a href="#" class="btn btn-success">Перейти</a>
                <img class="card-service__img" src="/layout/img/services-img5.svg" alt="Тесты">
            </div>
            <div class="card-service">
                <p class="card-service__title">Подберите тренировку</p>
                <p class="card-service__text">Программы занятий на каждый день</p>
                <a href="#" class="btn btn-success">Подобрать</a>
                <img class="card-service__img" src="/layout/img/services-img6.svg" alt="Тренировка">
            </div>
            <div class="card-service">
                <p class="card-service__title">О составе продуктов питания</p>
                <p class="card-service__text">Узнайте больше о полезных веществах и микроэлементах</p>
                <a href="#" class="btn btn-success">Узнать больше</a>
                <img class="card-service__img" src="/layout/img/services-img7.svg" alt="Составе">
            </div>
        </div>
    </div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
