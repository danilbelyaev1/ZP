<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("О составе продуктов питания");

$COMPIBLOCKID = \Local\Core\Assistant\Iblock\Iblock::getIdByCode("SERVICES", "COMPOSITION");
//Корневые разделы
//            $items = GetIBlockSectionList(33, 0, Array("sort" => "desc"), 99);
$items = CIBlockSection::GetList(["SORT" => "DESC"], ['IBLOCK_ID' => $COMPIBLOCKID, 'ACTIVE' => 'Y', 'DEPTH_LEVEL' => 1], 0, ['ID', 'CODE', 'IBLOCK_ID', 'PICTURE', 'NAME', 'DESCRIPTION', 'UF_*'], 0);
$buttons = [];
$sections = array();
while ($arItem = $items->GetNext()) {
//Подразделы
	$rsParentSection = CIBlockSection::GetByID($arItem['ID']);

	if ($arParentSection = $rsParentSection->GetNext()) {
		$buttons[] = $arParentSection;
		$arFilter = array('IBLOCK_ID' => $COMPIBLOCKID, '>LEFT_MARGIN' => $arParentSection['LEFT_MARGIN'], '<RIGHT_MARGIN' => $arParentSection['RIGHT_MARGIN'], '>DEPTH_LEVEL' => $arParentSection['DEPTH_LEVEL']); // выберет потомков без учета активности
		$rsSect = CIBlockSection::GetList(array("SORT" => "DESC", 'left_margin' => 'asc'), $arFilter, false, array("ID", "NAME"));
		while ($arSect = $rsSect->GetNext()) {
			// получаем подразделы
			$sections[$arParentSection["ID"]][] = $arSect;
		}
	}
}

?>
<section>
	<div class="container">
		<? $APPLICATION->IncludeComponent("bitrix:breadcrumb", "zp", array(
			"START_FROM" => "0",    // Номер пункта, начиная с которого будет построена навигационная цепочка
			"PATH" => "",    // Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
			"SITE_ID" => "s1",    // Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		),
			false
		); ?>
	</div>
</section>
<section>
	<div class="container">
		<h1 class="h2 mb-40">О составе продуктов питания</h1>

		<nav>
			<div class="badge-list scroll-mobile mb-40 nav" id="nav-tab" role="tablist">
				<?
				$i = 0;
				foreach ($buttons as $button): ?>
					<button class="<? if ($i == 0) echo 'active '; ?>badge bg-success-light text-dark badge-lg"
							id="nav-<?= $button["CODE"] ?>-tab"
							data-bs-toggle="tab" data-bs-target="#nav-<?= $button["CODE"] ?>" type="button" role="tab"
							aria-controls="nav-<?= $button["CODE"] ?>"
							aria-selected="true"><?= $button["NAME"] ?></button>
					<?
					$i++;
				endforeach; ?>
			</div>
		</nav>
		<div class="tab-content" id="nav-tabContent">
			<?
			$i = 0;
			foreach ($buttons as $button):
			?>
			<div class="<? if ($i == 0) echo 'active show '; ?>tab-pane fade" id="nav-<?= $button["CODE"] ?>"
				 role="tabpanel"
				 aria-labelledby="nav-<?= $button["CODE"] ?>-tab">
				<div class="w-100">
					<?
					foreach ($sections[$button["ID"]] as $sect):
						?>
						<?
						$arrFilter = Array(
							"SECTION_ID" => Array($sect["ID"])
						);
						$APPLICATION->IncludeComponent(
							"bitrix:news.list",
							"composition",
							array(
								"NAME" => $sect["NAME"],
								"DISPLAY_DATE" => "N",
								"DISPLAY_NAME" => "Y",
								"DISPLAY_PICTURE" => "Y",
								"DISPLAY_PREVIEW_TEXT" => "Y",
								"AJAX_MODE" => "N",
								"IBLOCK_TYPE" => "-",
								"IBLOCK_ID" => $COMPIBLOCKID,
								"NEWS_COUNT" => "20",
								"SORT_BY1" => "SORT",
								"SORT_ORDER1" => "DESC",
								"SORT_BY2" => "SORT",
								"SORT_ORDER2" => "ASC",
								"FILTER_NAME" => "arrFilter",
								"FIELD_CODE" => array(
									0 => "",
									1 => "",
								),
								"PROPERTY_CODE" => array(
									0 => "Variant",
									1 => "PhysiologicalNeedForWoman",
									2 => "PhysiologicalNeedForMen",
									3 => "DESCRIPTION",
									4 => "",
								),
								"CHECK_DATES" => "Y",
								"DETAIL_URL" => "",
								"PREVIEW_TRUNCATE_LEN" => "",
								"ACTIVE_DATE_FORMAT" => "d.m.Y",
								"SET_TITLE" => "N",
								"SET_BROWSER_TITLE" => "N",
								"SET_META_KEYWORDS" => "N",
								"SET_META_DESCRIPTION" => "N",
								"SET_LAST_MODIFIED" => "N",
								"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
								"ADD_SECTIONS_CHAIN" => "N",
								"HIDE_LINK_WHEN_NO_DETAIL" => "N",
								"PARENT_SECTION" => "",
								"PARENT_SECTION_CODE" => "",
								"INCLUDE_SUBSECTIONS" => "Y",
								"CACHE_TYPE" => "A",
								"CACHE_TIME" => "3600",
								"CACHE_FILTER" => "Y",
								"CACHE_GROUPS" => "Y",
								"DISPLAY_TOP_PAGER" => "N",
								"DISPLAY_BOTTOM_PAGER" => "N",
								"PAGER_TITLE" => "Новости",
								"PAGER_SHOW_ALWAYS" => "N",
								"PAGER_TEMPLATE" => "",
								"PAGER_DESC_NUMBERING" => "N",
								"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
								"PAGER_SHOW_ALL" => "N",
								"PAGER_BASE_LINK_ENABLE" => "N",
								"SET_STATUS_404" => "Y",
								"SHOW_404" => "Y",
								"MESSAGE_404" => "",
								"PAGER_BASE_LINK" => "",
								"PAGER_PARAMS_NAME" => "arrPager",
								"AJAX_OPTION_JUMP" => "N",
								"AJAX_OPTION_STYLE" => "Y",
								"AJAX_OPTION_HISTORY" => "N",
								"AJAX_OPTION_ADDITIONAL" => "",
								"COMPONENT_TEMPLATE" => "composition",
								"STRICT_SECTION_CHECK" => "N",
								"FILE_404" => ""
							),
							false
						);
						$i++;
						?>

					<? endforeach; ?>
			</div>
		</div>
		<? endforeach; ?>
	</div>
	</div>
</section>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
