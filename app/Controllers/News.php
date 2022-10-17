<?php

namespace App\Controllers;

use CLang;
use \App\Helpers\{Iblock, Url};

/**
 * Class News
 * @package App\Controllers
 */
class News
{
	const DEFAULT_COUNT = 3;
	const DEFAULT_SORT_BY = 'ACTIVE_FROM';
	const DEFAULT_SORT_ORDER = 'DESC';
	const IBLOCK_CODE = 'healthy_nutrition';
	const TEMPLATE_PATH = '/local/components/dalee/news.from.iblocks/templates/.default/';
	const SORT_BY_ARRAY = [
		'LIKES' => 'PROPERTY_VOTE_COUNT',
		'VIEWS' => 'SHOW_COUNTER'
	];

	/**
	 * Получение списка новостей
	 *
	 * @param array $params
	 * @return array
	 */
	public static function getAll($params = [])
	{
		global $DB;
		$items = [];
		$sectionIds = [];

		$countItems = !empty($params['count']) ? $params['count'] : self::DEFAULT_COUNT;
		$sortBy = !empty($params['sort_by']) ? $params['sort_by'] : self::DEFAULT_SORT_BY;
		if (!empty(self::SORT_BY_ARRAY[$sortBy])) $sortBy = self::SORT_BY_ARRAY[$sortBy];
		$sortOrder = !empty($params['sort_order']) ? $params['sort_order'] : self::DEFAULT_SORT_ORDER;
//		$idIblock = Iblock::getIblockIdByCode(self::IBLOCK_CODE);
		$idIblock = \Local\Core\Assistant\Iblock\Iblock::getIblockIdByCode(self::IBLOCK_CODE);

		$itemsSelect = [
			'ID',
			'IBLOCK_ID',
			'IBLOCK_SECTION_ID',
			'NAME',
			'ACTIVE_FROM',
			'DETAIL_PAGE_URL',
			'PREVIEW_PICTURE',
			'PREVIEW_TEXT',
			'DETAIL_TEXT',
			'PROPERTY_vote_count',
			'SHOW_COUNTER'
		];
		$itemsFilter = [
			"IBLOCK_ID" => $idIblock,
			"ACTIVE" => "Y",
			'<=DATE_ACTIVE_FROM' => date($DB->DateFormatToPHP(CLang::GetDateFormat("SHORT")), mktime())
		];
		if (!empty($params['section'])) {
			$itemsFilter['IBLOCK_SECTION_ID'] = $params['section'];
		}


		$itemsResult = \CIBlockElement::GetList(
			[
				$sortBy => $sortOrder
			],
			$itemsFilter,
			false,
			[
				"nPageSize" => $countItems
			],
			$itemsSelect
		);

		while ($item = $itemsResult->GetNextElement()) {
			$arFields = $item->GetFields();

			// Вытаскиваем видео из детального описания новости
			$searchvideo = preg_match("/VIDEO_([\d]+)/", $arFields['DETAIL_TEXT'], $matches);
			$videofile = '';
			if($searchvideo){
				$searchvideo = $matches[1];

				$arSelect = Array("ID", "IBLOCK_ID", "PROPERTY_FILE");
				$arFilter = Array("IBLOCK_ID"=>IntVal(13), "ID" => $searchvideo, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
				$res = \CIBlockElement::GetList(Array("SORT"=>"ASC"), $arFilter, false, Array(), $arSelect);
				while($ob = $res->GetNextElement())
				{
					if($ob->GetProperties()["FILE"]["VALUE"] <> '') $videofile = \CFile::GetPath($ob->GetProperties()["FILE"]["VALUE"]);
				}

			}
			else{
				$searchvideo = null;
			}

			$items[] = [
				'id' => $arFields['ID'],
				'name' => $arFields['NAME'],
				'text' => !empty($arFields['PREVIEW_TEXT']) ? strip_tags($arFields['PREVIEW_TEXT']) : '',
				'fulltext' => !empty($arFields['DETAIL_TEXT']) ? $arFields['DETAIL_TEXT'] : '',
				'fulltextvideofile' => !empty($videofile) ? $videofile : '',
				'picture' => !empty($arFields['PREVIEW_PICTURE']) ?
					Url::getFullUrl() . \CFile::GetPath($arFields["PREVIEW_PICTURE"]) : '',
				'date' => $arFields['ACTIVE_FROM'],
				'link' => Url::getFullUrl() . $arFields['DETAIL_PAGE_URL'],
				'count_likes' => !empty($arFields['PROPERTY_VOTE_COUNT_VALUE']) ? $arFields['PROPERTY_VOTE_COUNT_VALUE'] : 0,
				'count_views' => !empty($arFields['SHOW_COUNTER']) ? $arFields['SHOW_COUNTER'] : 0,
				'section_id' => !empty($arFields['IBLOCK_SECTION_ID']) ? $arFields['IBLOCK_SECTION_ID'] : '',
			];

			if (!empty($arFields['IBLOCK_SECTION_ID'])) $sectionIds[] = $arFields['IBLOCK_SECTION_ID'];
		}

		// Получаем информацию по разделам
		$sections = [];
		if (!empty($sectionIds)) {
			$sectionIds = array_unique($sectionIds);

			$sectionsFilter = [
				'IBLOCK_ID' => $idIblock,
				'GLOBAL_ACTIVE' => 'Y',
				'ID' => $sectionIds
			];
			$sectionsSelect = [
				'ID',
				'LIST_PAGE_URL',
				'NAME'
			];

			$sectionsResult = \CIBlockSection::GetList(
				[
					'LEFT_MARGIN' => 'ASC'
				],
				$sectionsFilter,
				false,
				$sectionsSelect
			);
			while ($sectionItem = $sectionsResult->GetNext()) {
				$sections[$sectionItem['ID']] = [
					'id' => $sectionItem['ID'],
					'name' => $sectionItem['NAME'],
					'link' => Url::getFullUrl() . $sectionItem['LIST_PAGE_URL'] . '?SECTION_IDS[]=' . $sectionItem['ID'],
				];
			}
		}

		// Присваиваем элементам разделы
		foreach ($items as &$item) {
			if (!empty($sections[$item['section_id']])) {
				$item['section_name'] = $sections[$item['section_id']]['name'];
				$item['section_link'] = $sections[$item['section_id']]['link'];
			}
		}

		return $items;
	}

	/**
	 * Получение HTML кода новостей главной страницы
	 *
	 * @return string
	 */
	public static function getHtml()
	{
		global $APPLICATION;

		ob_start();
		$APPLICATION->IncludeComponent(
			"dalee:news.from.iblocks",
			".default",
			array(
				"ACTIVE_DATE_FORMAT" => "d F",
				"ADD_SECTIONS_CHAIN" => "N",
				"AJAX_MODE" => "N",
				"AJAX_OPTION_ADDITIONAL" => "",
				"AJAX_OPTION_HISTORY" => "N",
				"AJAX_OPTION_JUMP" => "N",
				"AJAX_OPTION_STYLE" => "Y",
				"CACHE_FILTER" => "N",
				"CACHE_GROUPS" => "Y",
				"CACHE_TIME" => "36000000",
				"CACHE_TYPE" => "N",
				"CHECK_DATES" => "Y",
				"DETAIL_URL" => "",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"DISPLAY_DATE" => "Y",
				"DISPLAY_NAME" => "Y",
				"DISPLAY_PICTURE" => "Y",
				"DISPLAY_PREVIEW_TEXT" => "Y",
				"DISPLAY_TOP_PAGER" => "N",
				"PAGER_TEMPLATE" => "more_main",
				"FIELD_CODE" => array(
					0 => "SHOW_COUNTER",
				),
				"PROPERTY_CODE" => array(
					"LIKES_COUNT",
					"VIEWS_COUNT",
					"STICKY_VALUE",
					"TYPE_VALUE"
				),
				"FILTER_NAME" => "arrFilter",
				"HIDE_LINK_WHEN_NO_DETAIL" => "N",
				"IBLOCK_TYPE" => "content_sections",
				"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
				"MESSAGE_404" => "",
				"NEWS_COUNT" => \Local\Core\Assistant\Iblock\Iblock::getIblockIdByCode(self::IBLOCK_CODE),
				"PAGER_BASE_LINK_ENABLE" => "N",
				"PAGER_DESC_NUMBERING" => "N",
				"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
				"PAGER_SHOW_ALL" => "N",
				"PAGER_SHOW_ALWAYS" => "N",
				"PAGER_TITLE" => "Новости",
				"PARENT_SECTION_CODE" => "",
				"PREVIEW_TRUNCATE_LEN" => "",
				"SEF_FOLDER" => "/news/",
				"SEF_MODE" => "Y",
				"SEF_URL_TEMPLATES" => array(
					"detail" => "#ELEMENT_ID#/",
					"news" => "",
					"section" => ""
				),
				"SET_BROWSER_TITLE" => "N",
				"SET_LAST_MODIFIED" => "N",
				"SET_META_DESCRIPTION" => "N",
				"SET_META_KEYWORDS" => "N",
				"SET_STATUS_404" => "N",
				"SET_TITLE" => "N",
				"SHOW_404" => "N",
				"SORT_BY1" => "DATE_ACTIVE_FROM",
				"SORT_BY2" => "SORT",
				"SORT_ORDER1" => "DESC",
				"SORT_ORDER2" => "ASC",
				"STRICT_SECTION_CHECK" => "N",
				"USE_RATING" => "Y",
				"MAX_VOTE" => "1",
				"VOTE_NAMES" => array("1"),
			)
		);
		$content = ob_get_contents();
		ob_end_clean();

		return $content;
	}

	/**
	 * Получение PHP кода новостей с главной страницы
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function getPhp()
	{
		$fileTemplate = $_SERVER['DOCUMENT_ROOT'] . self::TEMPLATE_PATH . 'template.php';

		if (!file_exists($fileTemplate)) {
			throw new \Exception("PHP файл с шаблоном новостей не найден!");
		}

		return file_get_contents($fileTemplate);
	}

	/**
	 * Получение JS кода новостей с главной страницы
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function getJs()
	{
		$fileTemplate = $_SERVER['DOCUMENT_ROOT'] . self::TEMPLATE_PATH . 'script.js';

		if (!file_exists($fileTemplate)) {
			throw new \Exception("JS файл для новостей не найден!");
		}

		return file_get_contents($fileTemplate);
	}

	/**
	 * Получение CSS кода новостей с главной страницы
	 *
	 * @return string
	 * @throws \Exception
	 */
	public static function getCss()
	{
		$fileTemplate = $_SERVER['DOCUMENT_ROOT'] . self::TEMPLATE_PATH . 'style.css';

		if (!file_exists($fileTemplate)) {
			throw new \Exception("CSS файл для новостей не найден!");
		}

		return file_get_contents($fileTemplate);
	}
}
