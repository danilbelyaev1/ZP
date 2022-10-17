<?php

namespace App\Helpers;

/**
 * Class Search
 * @package App\Helpers
 */
class Search
{
	/**
	 * Исключаем поиск по описаниям
	 *
	 * @param array $arFields
	 * @return array
	 */
	function BeforeIndexHandler($arFields)
	{
//		if ($arFields["MODULE_ID"] == "iblock") {
//			if (array_key_exists("BODY", $arFields)) {
//				$arFields["BODY"] = "";
//				$arFields['TAGS'] = "";
//			}
//		}

		return $arFields;
	}
}
