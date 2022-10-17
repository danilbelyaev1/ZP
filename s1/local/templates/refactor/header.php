<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
use Bitrix\Main\Page\Asset;
?>
<!doctype html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><? $APPLICATION->ShowTitle(); ?></title>
	<link  rel="icon" href="/layout/img/favicon/favicon.ico" type="image/x-icon">
	<script src="https://yastatic.net/share2/share.js" defer></script>

	<?
	//ToDo
	//Редиректнем если пользователь обновил страницу во vue router
	$urls = [
		'/rasstroistva-pischevogo-povedeniya/choose-gender',
		'/rasstroistva-pischevogo-povedeniya/create-char',
		'/rasstroistva-pischevogo-povedeniya/test-start',
		'/rasstroistva-pischevogo-povedeniya/test',
		'/rasstroistva-pischevogo-povedeniya/test-result'
	];
	if (in_array($_SERVER['REQUEST_URI'], $urls))	{
		localRedirect('/rasstroistva-pischevogo-povedeniya/');
	}
    Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js");
	Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.min.js");
	Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js");
	Asset::getInstance()->addJs("https://cdnjs.cloudflare.com/ajax/libs/jquery.panzoom/4.0.0/panzoom.min.js");
    Asset::getInstance()->addJs("/layout/dist/app.js");
    Asset::getInstance()->addJs("/layout/dist/default.js");
    Asset::getInstance()->addJs("/layout/dist/vendor.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/filter_tag.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH."/js/jquery.fancybox.min.js");
	Asset::getInstance()->addCss( "https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/css/datepicker.min.css");
	Asset::getInstance()->addCss( "https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH."/help-consumer.scss");
	Asset::getInstance()->addCss( "/layout/dist/vendor.css");
	Asset::getInstance()->addCss( "/layout/dist/style.css");
	?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.25.0/axios.min.js" integrity="sha512-/Q6t3CASm04EliI1QyIDAA/nDo9R8FQ/BULoUFyN4n/BDdyIxeH7u++Z+eobdmr11gG5D/6nPFyDlnisDwhpYA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<? $APPLICATION->ShowHead();  ?>
	<style>
		.g-loader{
			position: fixed;
			top: 0;
			left: 0;
			z-index: 999;
			background: #fff;
			width: 100%;
			height: 100vh;
			display: flex;
			align-items: center;
			justify-content: center;
			flex-direction: column;

		}
		.g-loader.remove {
			display: none;
		}
		.g-loader__img{
			width: 58px;
			margin-bottom: 24px;
		}
		.g-loader__title{
			font-weight: 500;
			font-size: 20px;
			line-height: 140%;
			color: #A6D363;
			font-family: 'GolosTextWebMedium';
			margin-bottom: 8px;
		}
		.g-loader__text{
			font-size: 12px;
			line-height: 16px;
			margin-bottom: 24px;
		}
		.g-loader__progress{
			background: #EBEBEB;
			border-radius: 4px;
			width: 160px;
			height: 8px;
			position: relative;
		}
		.g-loader__progress--line{
			position: absolute;
			top: 0;
			left: 0;
			border-radius: 4px;
			display: block;
			background: #A6D363;
			opacity: 1;
			height: 100%;
			width: 0;
			transition-timing-function: linear;
		}

		.g-loader__progress.load .g-loader__progress--line {
			width: 96%;
			transition: 5s;
		}
		.g-loader__progress.loaded:before {
			width: 100%;
		}


		.g-loader__progress:before {
			content: '';
			display: block;
			width: 0;
			height: 100%;
			transition: 0.5s !important;
			background-color: #A6D363;
			border-radius: 4px;
			position: absolute;
			top: 0;
			left: 0;
			transition-timing-function: linear;
		}

	</style>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript">
		(function (m, e, t, r, i, k, a) {
			m[i] = m[i] || function () {
				(m[i].a = m[i].a || []).push(arguments);
			};
			m[i].l = 1 * new Date();
			k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a);
		})
		(window, document, 'script', 'https://mc.yandex.ru/metrika/tag.js', 'ym');

		ym(67155019, 'init', {
			clickmap: true,
			trackLinks: true,
			accurateTrackBounce: true,
			webvisor: true
		});
	</script>
	<noscript>
		<div><img src="https://mc.yandex.ru/watch/67155019" style="position:absolute; left:-9999px;" alt=""/></div>
	</noscript>
	<!-- /Yandex.Metrika counter -->
</head>
<div id="panel">
	<? $APPLICATION->ShowPanel(); ?>
</div>
<body>
<div class="g-loader" id="gLoader">
	<img class="g-loader__img" src="/layout/img/logo/logo-small.png" alt="Логотип">
	<p class="g-loader__title">Здоровое питание</p>
	<p class="g-loader__text">Проект Роспотребнадзора</p>
	<div class="g-loader__progress" id="gProgress">
		<div class="g-loader__progress--line"></div>
	</div>
</div>
<header id="header">
	<div class="container">
		<div class="d-flex flex-row">
		<a class="h-logo__demography-wrapp" href="https://национальныепроекты.рф/projects/demografiya?ysclid=l8lhuximkp43094488" target="_blank" alt="Демография- Национальные Проекты России">
			<img class="h-logo__demography" src="/layout/img/logo/logo-demography.png"
		</a>

		<a href="/" class="h-logo">
			<img class="h-logo__logo" src="/layout/img/logo/logo-small.png" alt="Здоровое питание">
			<span class="h-logo__text">
            <span class="h-logo__text--primary">Здоровое <span class="d-block">питание</span></span>
            <span class="h-logo__text--secondary">Проверено <span class="d-block">Роспотребнадзором</span></span>
        </span>
		</a>
		</div>
		<a href="/healthy-nutrition/news/proekt-zdorovoe-pitanie-nagrazhden-premiey-runeta-2021-/" class="h-award">
			<img class="h-award__img" src="/layout/img/logo/runet.jpg" alt="Рунет">
			<span class="h-award__text">Премия <span class="d-block">Рунета</span></span>
		</a>
		<div class="h-search">
			<?
			$APPLICATION->IncludeComponent("bitrix:search.form", "template1", Array(
	"USE_SUGGEST" => "N",	// Показывать подсказку с поисковыми фразами
		"PAGE" => "/search/index.php",	// Страница выдачи результатов поиска (доступен макрос #SITE_DIR#)
	),
	false
); ?>
		</div>
		<div class="h-burger" id="burger"></div>
		<ul class="g-social mb-0">
			<li><a target="_blank" href="https://vk.com/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-vk.svg" alt="Вконтакте"></a></li>
			<li><a target="_blank" href="https://ok.ru/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-od.svg" alt="Одноклассники"></a></li>
			<li><a target="_blank" href="https://vb.me/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-vb.svg" alt="Вайбер"></a></li>
			<li><a target="_blank" href="https://t.me/rpn_zdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-tl.svg" alt="Телеграмм"></a></li>
		</ul>
		<?
		global $USER;
		if (!$USER->isAuthorized()):?>
			<button class="h-enter" data-bs-toggle="modal" data-bs-target="#exampleModalAuthEmail">
				<!-- TODO: если не авторизованный то выводим /layout/img/ava.svg -->
				<!-- TODO: если авторизованный и нет аватарики то выводим /layout/img/ava-authorized -->
				<img class="h-enter__avatar" src="/layout/img/ava.svg" alt="Аватар">
				<span class="h-enter__text ">Войти</span>
				<!-- TODO: в title выводим Имя и Фамилию  -->
				<span class="h-enter__name d-none" title="Имя Фамилия">
					<span class="d-block">Имя</span>
					<span class="d-block">Фамилия</span>
				</span>
			</button>
		<?else:?>
			<?$photo = CFile::getPath($USER -> GetByID($USER->GetID())->Fetch()['PERSONAL_PHOTO']);?>
			<a href="/personal/" class="h-enter">
				<img class="h-enter__avatar" src="<?=$photo ? $photo : '/layout/img/ava-authorized.svg'?>" alt="Аватар">
				<span class="h-enter__text" title="<?=$USER->getFullName();?>"><?=$USER->getFullName();?></span>
			</a>
		<?endif;?>
		<?$APPLICATION->IncludeComponent("bitrix:menu", "topmenu", Array(
	"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"CHILD_MENU_TYPE" => "top",	// Тип меню для остальных уровней
		"USE_EXT" => "Y",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"ALLOW_MULTI_SELECT" => "Y",	// Разрешить несколько активных пунктов одновременно
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
	),
	false
);?>

	</div>
</header>
<main>

