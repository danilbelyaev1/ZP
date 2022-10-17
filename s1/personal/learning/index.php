<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Моё обучение");
global $USER;
if (!$USER->IsAuthorized()) LocalRedirect('/auth/', '', 301);
$courses = [];
$testsResults = [];
$tests = [];
//Получим тесты
$res = \CIBlockSection::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('SCHOOL', 'lesson-testing')], 0, ['*', 'UF_*'], 0);
while ($arSection = $res -> GetNext()) {
	$tests[$arSection['UF_LESSONS']] = $arSection;
}

//Получим курсы
$res = \CIBlockSection::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('SCHOOL', 'courses_and_lessons')], 0, ['*', 'UF_*'], 0);
while ($arSection = $res -> GetNext()) {
	$courses[$arSection['ID']] = $arSection;
}
//Получим результаты тестов текущего юзера
$res = \CIBlockElement::GetList(['DATE_CREATE' => 'DESC'], ['IBLOCK_ID' => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('SCHOOL', 'passed_tests'), 'PROPERTY_USER' => $USER -> GetId()], 0, 0, ['*', 'PROPERTY_TESTS_RESULTS_ARRAY', 'PROPERTY_TESTS_SECTION', 'PROPERTY_TESTS_RESULTS', 'PROPERTY_TEST_ID']);
while ($arItem = $res -> GetNext())	{
	//Урок привязанный к тесту
	$arItem['PROPERTY_TESTS_SECTION_VALUE'] = str_replace('&quot;', '"', $arItem['PROPERTY_TESTS_SECTION_VALUE']['TEXT']);
	$arItem['PROPERTY_TESTS_SECTION_VALUE'] = json_decode($arItem['PROPERTY_TESTS_SECTION_VALUE'], 1);
	//Результаты теста
	$arItem['PROPERTY_TESTS_RESULTS_ARRAY_VALUE'] = str_replace('&quot;', '"', $arItem['PROPERTY_TESTS_RESULTS_ARRAY_VALUE']['TEXT']);
	$arItem['PROPERTY_TESTS_RESULTS_ARRAY_VALUE'] = json_decode($arItem['PROPERTY_TESTS_RESULTS_ARRAY_VALUE'], 1);

	$testsResults[$arItem['PROPERTY_TESTS_SECTION_VALUE']['ID']][] = $arItem;
}
//Получим уроки курсов, рассортируем по курсам, вложим нужный тест и его результаты
$res = \CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => \Local\Core\Assistant\Iblock\Iblock::getIdByCode('SCHOOL', 'courses_and_lessons')], 0, 0, ['ID', 'IBLOCK_ID', 'NAME', 'IBLOCK_SECTION_ID']);
while ($arItem = $res -> GetNext())	{
	$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']] = $arItem;
	$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST'] = $tests[$arItem['ID']];
	if ($testsResults[$tests[$arItem['ID']]['ID']])	{
		$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST']['USER_RESULTS'] = $testsResults[$tests[$arItem['ID']]['ID']];
		$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST']['USER_TRY'] = count($testsResults[$tests[$arItem['ID']]['ID']]);
		$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST']['QUESTIONS_COUNT'] = count($testsResults[$tests[$arItem['ID']]['ID']][0]['PROPERTY_TESTS_RESULTS_ARRAY_VALUE']);
		$courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST']['RIGHT'] = 0;
		foreach ($testsResults[$tests[$arItem['ID']]['ID']][0]['PROPERTY_TESTS_RESULTS_ARRAY_VALUE'] as $userResult)	{
			$isPlus = true;
			foreach ($userResult as $answer)	{
				if (!$answer)	{
					$isPlus = false;
				}
			}
			if ($isPlus) $courses[$arItem['IBLOCK_SECTION_ID']]['lessons'][$arItem['ID']]['TEST']['RIGHT'] += 1;
		}
	}
}
$iblockId = \Local\Core\Assistant\Iblock\Iblock::getIdByCode('content_sections', 'healthy_nutrition');
$sectionId = \CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblockId, 'CODE' => 'recipes'))->Fetch()["ID"];
$recipesCount = 0;
$res = \CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => $iblockId, 'IBLOCK_SECTION_ID' => $sectionId, 'CREATED_BY' => $USER->GetId(), 'SHOW_NEW' => 'Y', 'ACTIVE' => 'Y'], 0, 0, ['ID', 'IBLOCK_ID']);
while ($arItem = $res -> GetNext())	{
	$recipesCount += 1;
}
?>

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
			<h1 class="mb-40">
				Личный кабинет
			</h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="badge-list bigSize scroll-mobile pb-md-3 pb-1 mb-md-4 mb-3" >
				<a href="/personal/" class="tag-elem badge bg-success-light text-dark badge-xl">Профиль</a>
				<a href="/personal/learning/" class="all badge bg-success-light active text-dark badge-xl">Мое обучение</a>
				<a href="/personal/diary/"  class="tag-elem badge bg-success-light text-dark badge-xl">Дневник питания</a>
				<a href="/personal/recipes/"  class="tag-elem badge bg-success-light text-dark badge-xl">Мои рецепты <sup class="ms-1"><?=$recipesCount ? $recipesCount : ''?></sup></a>
				<a href="/personal/favourites/"  class="tag-elem badge bg-success-light text-dark badge-xl">Избранное <sup class="ms-1"><?=\Local\Core\Assistant\HighLoadBlock\HighLoadBlock::getLikesCount()?></sup></a>
			</div>
		</div>
	</section>

<?
if (count($courses) > 0): ?>
	<section>
		<div class="container mainTraining counterHead">
			<? foreach ($courses as $course): ?>
			<?
			$haveTest = false;
			$lessonsCount = 0;
			$endedLessons = 0;
			foreach ($course['lessons'] as $lesson)	{
				if (!empty($lesson['TEST'])) $haveTest = true;
				if ($lesson['TEST']['RIGHT'] && $lesson['TEST']['QUESTIONS_COUNT'])	{
					if ($lesson['TEST']['RIGHT'] == $lesson['TEST']['QUESTIONS_COUNT']) $endedLessons += 1;
				}
				if (!empty($lesson['TEST'])) $lessonsCount += 1;
			}
			if (!$haveTest) continue;
			?>
			<div class="wrapTraining d-flex align-items-center flex-wrap">
				<h4 class="w-100 mb-3 pb-md-3 pb-2">
					Курс <span class="counterNumber"></span>. <?= $course["NAME"] ?>
				</h4>
				<div class="mainProgress d-md-flex flex-wrap align-items-center pb-3 col px-0">
					<div class="progressText pe-md-3 me-md-3 mb-md-3 mb-2">
						Пройдено <?=$endedLessons?>/<?=$lessonsCount?> уроков
					</div>
					<div class="wrapProgress position-relative mb-md-3 mb-2" >
						<div class="progressLine" style="width: <?=$endedLessons/$lessonsCount*100?>%;">

						</div>
					</div>
				</div>
				<div class="greenTable trainingTable w-100 countTable">
					<div class="greenTableHead w-100 d-flex flex-wrap">
						<div class="greenTable-th text-center">
							№
						</div>
						<div class="greenTable-th col">
							Урок
						</div>
						<div class="greenTable-th d-md-block d-none">
							Результат
						</div>
						<div class="greenTable-th d-md-block d-none">
							Попытка
						</div>
					</div>
					<? asort($course["lessons"]); ?>
					<script>
					console.log(<?=CUtil::PHPToJSObject($course)?>);
					</script>
					<? foreach ($course["lessons"] as $lesson): ?>
					<?if (empty($lesson['TEST'])) continue;?>
					<div class="greenTable-tr w-100 d-flex flex-wrap position-relative">
						<div class="greenTable-td d-flex align-items-center justify-content-center">
							<div class="countTableNumber d-inline-block">

							</div>
						</div>
						<div class="greenTable-td col">
							<a href="<?=$lesson["TEST"]["SECTION_PAGE_URL"]?>/">
								<?=$lesson["NAME"]?>
							</a>
						</div>
						<div class="greenTable-td">
					<span class=" d-inline-block d-md-none">
						Результат:
					</span>
							<?if ($lesson['TEST']['QUESTIONS_COUNT']):?>
								<?=$lesson['TEST']['RIGHT']?>/<?=$lesson['TEST']['QUESTIONS_COUNT']?>
							<?endif;?>
						</div>
						<div class="greenTable-td ">
						<span class=" d-inline-block d-md-none">
					Попытка:
					</span>
							<?=$lesson['TEST']['USER_TRY']?>
						</div>
					</div>
					<?endforeach;?>

				</div>
			</div>
			<?endforeach;?>
		</div>
	</section>
<? endif; ?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
