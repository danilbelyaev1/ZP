<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат теста");

if(!$_SESSION["TESTS_RESULTS"] and !$_SESSION["TESTS_RESULTS_ARRAY"]) LocalRedirect("/", false, 301);

$count = 0;
if(is_null($_SESSION["TESTS_RESULTS"])){
    $count = 0;
} else {
    $count = count($_SESSION["TESTS_RESULTS"]);
}

$datetime1 = new DateTime(date('d.m.Y h:i:s', $_SESSION["TESTS_RESULTS_DATE_START"]));
$datetime2 = new DateTime(date('d.m.Y h:i:s', $_SESSION["TESTS_RESULTS_DATE_END"]));
$interval = $datetime1->diff($datetime2);

$TESTS_SECTION = $_SESSION["TESTS_SECTION"]["UF_FINAL_MESSAGE"][count($_SESSION["TESTS_RESULTS_ARRAY"]) - $count - 1];

?>
<section>
	<div class="container">

		<!-- TODO: breadcrumb битрикса -->
		<div class="bx-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope=""
				 itemtype="http://schema.org/ListItem">

				<a href="/school/" title="Главная" itemprop="item">
					<span itemprop="name">Главная</span>
				</a>
				<meta itemprop="position" content="1">
			</div>
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope=""
				 itemtype="http://schema.org/ListItem">
				<i class="fa fa-angle-right"></i>
				<a href="/school/courses/" title="Главная" itemprop="item">
					<span itemprop="name">Школа здорового питания</span>
				</a>
				<meta itemprop="position" content="1">
			</div>
			<div class="bx-breadcrumb-item">
				<i class="fa fa-angle-right"></i>
				<span><?= $_SESSION['TESTS_SECTION']['NAME'] ?></span>
			</div>
		</div>

		<h2 class="mb-40 w-100"><?= $_SESSION['TESTS_SECTION']['NAME'] ?></h2>
		<h3 class="w-100 mb-40">Результаты теста</h3>
		<div class="mainResultTest">
			<div class="text-gray w-100 mb-2">
				Дата завершения: <?= date('d.m.Y h:i', $_SESSION["TESTS_RESULTS_DATE_END"]) ?>
			</div>
			<div class="text-gray w-100 mb-2">
				Потрачено времени: <?= $interval->format('%H:%I:%S') ?>
			</div>
			<div class="w-100 bigBlackGreenText mb-40 pt-md-3 pt-2 mt-md-3 mt-2">
				<?
				$correct = count($_SESSION["TESTS_RESULTS_ARRAY"]) - $count;
				$fullCount = count($_SESSION["TESTS_RESULTS_ARRAY"]);
				$allRight = $correct == $fullCount;
				?>
				<?= $correct ?><span>/<?= $fullCount ?></span>
			</div>
			<!--		<p>-->
			<!--			--><? //if ($correct > $fullCount/2 && !$allRight):?>
			<!--				Вы правильно ответили на большинство вопросов!-->
			<!--			--><? //elseif ($correct < $fullCount/2):?>
			<!--				Вы успешно ответили на --><? //=$correct?><!-- вопросов!-->
			<!--			--><? //elseif ($allRight):?>
			<!--				Вы успешно ответили на --><? //=$correct?><!-- вопросов!-->
			<!--			--><? //endif;?>
			<!--		</p>-->
			<!--		--><? //if (!$allRight):?>
			<!--		<p>-->
			<!--			Изучите материалы урока еще раз, чтобы улучшить свой-->
			<!--			результат.-->
			<!--		</p>-->
			<!--		--><? //endif;?>
			<? if ($allRight): ?>
				<p>
					<?= $_SESSION["TESTS_SECTION"]["UF_RESULT_TEXT_GOOD"] ?>
				</p>
			<? else: ?>
				<p><?= $_SESSION["TESTS_SECTION"]["UF_RESULT_TEXT_BAD"] ?></p>
			<? endif; ?>
		</div>
		<div class="pt-4 row px-2 btnBottomPage row">
			<? if ($_SESSION["TESTS_SECTION"]["UF_LESSONS"]): ?>
				<? if ($_SESSION['NEXT']['NEXT_LESSON_URL']): ?>
					<a type="button" href="<?= $_SESSION['NEXT']['NEXT_LESSON_URL'] ?>"
					   class="btn btn-success mx-2 mt-3 w-auto">Следующий урок</a>
				<? endif; ?>
				<? if (!$allRight): ?>
					<a type="button" href="<?= $_SESSION['TESTS_SECTION']['LESSON_DETAIL_URL'] ?>"
					   class="btn btn-outline-success mx-2 mt-3 w-auto">Изучить материалы еще раз</a>
				<? endif; ?>
			<? else: ?>
				<? if ($_SESSION['NEXT']['NEXT_LESSON_URL']): ?>
					<a type="button" href="/school/" class="btn btn-success mx-2 mt-3 w-auto">На главную</a>
				<? endif; ?>
				<? if (!$allRight): ?>
					<a type="button" href="<?= $_SESSION['TESTS_SECTION']['SECTION_PAGE_URL'] ?>"
					   class="btn btn-outline-success mx-2 mt-3 w-auto">Вернуться к тесту</a>
				<? endif; ?>
			<? endif; ?>
		</div>
	</div>
</section>
<?php
unset($_SESSION["TESTS_RESULTS_DATE_START"]);
unset($_SESSION["TESTS_ANSWER"]);
unset($_SESSION["TESTS_RESULTS"]);
unset($_SESSION["TESTS_RESULTS_ARRAY"]);
unset($_SESSION["TESTS_SECTION"]);
unset($_SESSION["TESTS_RESULTS_DATE_END"]);
unset($_SESSION["CURRENT_TEST"]);

?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
