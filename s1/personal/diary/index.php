<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Дневник питания");
global $USER;
use \Local\Core\Assistant\CPrograms;
if (!$USER->IsAuthorized()) LocalRedirect('/auth/', '', 301);
$iblockId = \Local\Core\Assistant\Iblock\Iblock::getIdByCode('content_sections', 'healthy_nutrition');
$sectionId = \CIBlockSection::GetList(array(), array('IBLOCK_ID' => $iblockId, 'CODE' => 'recipes'))->Fetch()["ID"];
$recipesCount = 0;
$res = \CIBlockElement::GetList(['SORT' => 'ASC'], ['IBLOCK_ID' => $iblockId, 'IBLOCK_SECTION_ID' => $sectionId, 'CREATED_BY' => $USER->GetId(), 'SHOW_NEW' => 'Y', 'ACTIVE' => 'Y'], 0, 0, ['ID', 'IBLOCK_ID']);
while ($arItem = $res -> GetNext())	{
	$recipesCount += 1;
}
$arResult = [];
if ($_REQUEST["ADDPROG"]) {//Добавляем юзеру новую программу
	if (is_numeric($_REQUEST["ADDPROG"])) {
		$arResult["PROGRAM"] = true;
		//Получить все программы пользователя и если они есть - удалить
		$programsItems = CPrograms::getList($USER->GetId());
		foreach ($programsItems as $item) {
			CPrograms::delete($item["ID"], $USER->GetId());
		}
		//проверить, есть ли программа с таким id и если есть - добавить
		$res = \CIBlockElement::GetByID($_REQUEST["ADDPROG"]);
		if ($ar_res = $res->GetNext()) {
			$arResult["USERPROGRAM"] = $ar_res;
			$item["ID"] = CPrograms::add($USER->GetId(), $ar_res["ID"]);
			LocalRedirect('/personal/diary/');
		}
	}
} elseif ($_REQUEST["PROGRESS"]) {//Какое то выполнено действие над программой и нужно перезаполнить значения
	$arResult["PROGRAM"] = true;
	$days = array();
	$programsItems = CPrograms::getList($USER->GetId());
	foreach ($programsItems as $item) {
		if ($item["ID"]) {
			$arProperties = Local\Core\Assistant\Iblock\ElementProperty::getProgrambyId($item["ELEMENT_ID"]);
//            dump($arProperties["DAYS"]);
			$days = $arProperties["DAYS"];
			sort($days);
			$days[10] = $days[0];
			unset($days[0]);
			$arResult["DAYS"] = $days;
			$arResult["DAYNAMES"] = $arProperties["DAYNAMES"];
			unset($arProperties["DAYS"]);
			unset($arProperties["DAYNAMES"]);
			$arResult["USERPROGRAM"] = $arProperties;
			$arResult["DAYSFOOD"] = CPrograms::getDaysFood($USER->GetId());
		}
	}
} elseif ($_REQUEST["RESETPROG"]) {//Сброс текущей программы
	$arResult["PROGRAM"] = true;
	//Получить все программы пользователя и если они есть - удалить
	$programsItems = CPrograms::getList($USER->GetId());
	foreach ($programsItems as $item) {
		CPrograms::delete($item["ID"], $USER->GetId());
	}
} elseif ($_REQUEST["COMPLETE"]) {//Выполняем прием пищи
	$arResult["PROGRAM"] = true;
	CPrograms::complete($_REQUEST["COMPLETE"], $_REQUEST["day"], $USER->GetId());
	LocalRedirect('/personal/diary/');
} else {//Общая вкладка кабинета, все равно нужно вытащить программу - Вытаскиваем текущую программу пользователя
	$programsItems = CPrograms::getList($USER->GetId());
	foreach ($programsItems as $item) {
		if ($item["ID"]) {
			$arProperties = Local\Core\Assistant\Iblock\ElementProperty::getProgrambyId($item["ELEMENT_ID"]);
			$days = $arProperties["DAYS"];
			sort($days);
			$days[10] = $days[0];
			unset($days[0]);
			$arResult["DAYS"] = $days;
			$arResult["DAYNAMES"] = $arProperties["DAYNAMES"];
			unset($arProperties["DAYS"]);
			unset($arProperties["DAYNAMES"]);
			$arResult["USERPROGRAM"] = $arProperties;
			$arResult["DAYSFOOD"] = CPrograms::getDaysFood($USER->GetId());
		}
	}
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
				<a href="/personal/learning/" class="tag-elem badge bg-success-light text-dark badge-xl">Мое обучение</a>
				<a href="/personal/diary/"  class="all badge bg-success-light active text-dark badge-xl">Дневник питания</a>
				<a href="/personal/recipes/"  class="tag-elem badge bg-success-light text-dark badge-xl">Мои рецепты <sup class="ms-1"><?=$recipesCount ? $recipesCount : ''?></sup></a>
				<a href="/personal/favourites/"  class="tag-elem badge bg-success-light text-dark badge-xl">Избранное <sup class="ms-1"><?=\Local\Core\Assistant\HighLoadBlock\HighLoadBlock::getLikesCount()?></sup></a>
			</div>
		</div>
	</section>
	<? if (!$arResult["USERPROGRAM"]) { ?>
		<section>
			<div class="container">
				<h6 style="margin-bottom: 30px;">У вас нет активных программ</h6>
				<a href="/services/programs/" class="btn btn-success">Выбрать программу питания</a>
			</div>
		</section>
	<? } else { ?>
		<section>
			<div class="container mainFoodDiary">
			<div class="foodDiaryTop d-flex flex-wrap align-items-center">
				<h4 class="w-100 mb-3 pb-md-4 pb-2">
					<?= $arResult["USERPROGRAM"]["NAME"] ?>
				</h4>
				<?
				$summcall = 0;
				$successDay = 0;
				$totalDay = 0;

				foreach ($arResult["DAYS"] as $day) {

					foreach ($arResult["DAYSFOOD"][$day['ID']] as $f => $fday) {
						if ($fday == 'Y' and $f != 'ACTIVE') {
							$summcall += $day[$f . 'CAL'];
						}
					}
				}
				$totalccal = (int)$arResult["USERPROGRAM"]["CALORIES"]["VALUE"];
				$percent = ($summcall / ($totalccal) * 100);
				foreach ($arResult["DAYS"] as $day) {
					if ($day["ID"] == 0) $day["ID"] = 10;
					foreach ($arResult["DAYSFOOD"][$day['ID']] as $f => $fday) {
						if ($fday == 'Y' and $f != 'ACTIVE') {
							if ($day[$f]['TEXT']) {
								$successDay++;
							}
						} elseif ($fday == 'N') {
							if ($day[$f]['TEXT']) $totalDay++;
						}
					}
				}
				?>
				<div class="mainProgress col-md col-12 px-0">
					<div class="progressText mb-md-3 mb-2">
<!--						--><?//= $summcall ? $summcall.' ккал съедено (' : ''?><!----><?//= '<span class="sumcalltext">'.$successDay.'</span>' ?><!-- из --><?//= '<span id="totalccal">'.($totalDay + $successDay).'</span>' ?><!-- --><?//= $summcall ? ' приемов пищи)' : 'приемов пищи'?>
						<?='<span class="sumcalltext">'.$successDay.'</span>' ?> из <?= '<span id="totalccal">'.($totalDay + $successDay).'</span> приемов пищи'?>
					</div>
					<div class="wrapProgress position-relative mb-md-3 mb-2">
						<div class="progressLine" style="width: <?= ($successDay / $totalDay ) * 100 ?>%;">

						</div>
					</div>
				</div>
				<a type="button" href="/personal/diary/?RESETPROG=true" class="btn btn-outline-danger ms-md-3 ms-0">
					Завершить программу
				</a>

			</div>
			<div class="wrapTextTab pt-3 w-100 d-flex scroll-wrap">
				<? $daynumber = 0; ?>
				<? foreach ($arResult["DAYNAMES"] as $k => $name): ?>
					<? if ($name !== ''): ?>
						<button class="btnNone textTab mb-2 <?=$daynumber == 0 ? 'active' : ''?>" data-btn="<?=$k?>">
							<?=$name?>
						</button>
					<? endif; ?>
					<? $daynumber++; ?>
				<? endforeach; ?>
			</div>
			<?
			$i = 0;
			foreach ($arResult["DAYS"] as $key => $day) {
				if ($day["ID"] == 0) $day["ID"] = 10;
				if ($day["NAME"] === "") continue;
				?>
				<div class="wrapFoodDiaryDay day-<?=$key?> <?=$i != 0 ? 'd-none' : ''?>">
					<? if ($day["BREAKFAST"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Завтрак
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["BREAKFAST"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['BREAKFASTCAL'] ?>" data-eating="BREAKFAST" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["BREAKFAST"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["SECONDBREAKFAST"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Второй завтрак
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["SECONDBREAKFAST"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['SECONDBREAKFASTCAL'] ?>" data-eating="SECONDBREAKFAST" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["SECONDBREAKFAST"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["DINNER"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Обед
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["DINNER"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['DINNERCAL'] ?>" data-eating="DINNER" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["DINNER"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["AFTERNON"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Полдник
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["AFTERNON"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['AFTERNONCAL'] ?>" data-eating="AFTERNON" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["AFTERNON"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["LUNCH"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Ужин
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["LUNCH"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['LUNCHCAL'] ?>" data-eating="LUNCH" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["LUNCH"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["ZHOR"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								<?= $day["ZHORNAME"] ?>
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["ZHOR"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['ZHORCAL'] ?>" data-eating="ZHOR" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["ZHOR"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

					<? if ($day["RATION"]["TEXT"] != ''):?>
						<div class="wrapFoodDiary d-flex align-items-center flex-wrap">
							<h4 class="col mb-3">
								Сухой паек
							</h4>
							<label class="greenBrdCheck position-relative d-table ms-3 mb-3">
								<input type="checkbox" required="">
								<? if ($arResult["DAYSFOOD"][$day['ID']]["RATION"] == "Y") {
									?>
									<span class="btn btn-success">
										Выполнено
									</span>
								<? } else {
									?>

									<a data-calory="<?= $day['RATIONCAL'] ?>" data-eating="RATION" data-day="<?= $day['ID'] ?>"
									   href="#" class="btn btn-outline-success complete_programm">
										Выполнить
									</a>

								<? } ?>
							</label>

							<div class="static w-100 ">
								<?= $day["RATION"]["TEXT"] ?>
							</div>
						</div>
					<? endif; ?>

				</div>
				<?
				$i += 1;
				?>
			<?}?>
		</div>
		</section>
		<script>
			function removeElement(arr, sElement)
			{
				var tmp = new Array();
				for (var i = 0; i<arr.length; i++) if (arr[i] != sElement) tmp[tmp.length] = arr[i];
				arr=null;
				arr=new Array();
				for (var i = 0; i<tmp.length; i++) arr[i] = tmp[i];
				tmp = null;
				return arr;
			}

			function SectionClick(id)
			{
				var div = document.getElementById('user_div_'+id);
				if (div.className == "profile-block-hidden")
				{
					opened_sections[opened_sections.length]=id;
				}
				else
				{
					opened_sections = removeElement(opened_sections, id);
				}

				document.cookie = cookie_prefix + "_user_profile_open=" + opened_sections.join(",") + "; expires=Thu, 31 Dec 2020 23:59:59 GMT; path=/;";
				div.className = div.className == 'profile-block-hidden' ? 'profile-block-shown' : 'profile-block-hidden';
			}

			$(document).on("click", 'a.complete_programm', function (e) {
				e.preventDefault();
				var formData = new FormData();
				const eating = $(this).data("eating");
				const day = $(this).data("day");
				const calory = $(this).data("calory");
				let thusbutton = $(this);
				$(thusbutton).addClass('disabled');
				this.className = 'btn btn-success';
				this.textContent = 'Выполнено';
				formData.append('eating', eating);
				formData.append('day', day);
				if(formData){
					axios.post('/wms/ajax/completeeating/', formData)
						.then(function (response) {
							if(response.data.data == 'done'){
								// $('.sumcalltext').text(parseInt($('.sumcalltext').html()) + calory);
								$('.sumcalltext').text(parseInt($('.sumcalltext').html()) + 1);
								let percent = (parseInt($('.sumcalltext').html() / (parseInt($('#totalccal').html())) * 100));
								$('.wrapProgress .progressLine').css('width', percent+'%');
							} else if(response.data.data == 'delete'){
								thusbutton.text(parseInt(thisElement.html()) - 1).removeClass('selected');
							}
						})
						.catch(function (error) {
							console.log(error);
						});
				}
			});

			if (document.querySelector('.wrapTextTab'))	{
				let btns = document.querySelectorAll('button[data-btn]');
				btns.forEach(item => {
					item.addEventListener('click', () => {
						btns.forEach(item1 => {
							item1.classList.remove('active');
						})
						item.classList.add('active');

						document.querySelectorAll('.wrapFoodDiaryDay').forEach(item1 => {
							item1.classList.add('d-none');
							if (item1.classList.contains(`day-${item.getAttribute('data-btn')}`))	{
								item1.classList.remove('d-none');
							}
						})

					})
				})
			}
		</script>
	<?}?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
