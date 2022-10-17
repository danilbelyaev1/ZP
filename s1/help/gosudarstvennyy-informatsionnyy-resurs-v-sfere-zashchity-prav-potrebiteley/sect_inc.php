<?php ?>
<ul class="group-link">
	<li>Данный раздел содержит:</li>

	<?php

		CModule::IncludeModule("iblock");

		$arSelect = Array("ID", "NAME","PREVIEW_TEXT", "PROPERTY_LINK");
		$arFilter = Array("IBLOCK_ID"=>\Local\Core\Assistant\Iblock\Iblock::getIdByCode("help","gosudarstvennyy-informatsionnyy-resurs-v-sfere"), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
		$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
		while($ob = $res->GetNextElement())
		{

			$arFields = array_merge($ob->GetFields(), $ob->GetProperties());
			if($arFields["PREVIEW_TEXT"] <> '') {
				echo '<li><a target="_blank" href="' . $arFields["PROPERTY_LINK_VALUE"] . '">' . $arFields["PREVIEW_TEXT"] . '</a></li>';
			} else {
				echo '<li><a target="_blank" href="' . $arFields["PROPERTY_LINK_VALUE"] . '">' . $arFields["NAME"] . '</a></li>';
			}

		}

		?>

</ul>
