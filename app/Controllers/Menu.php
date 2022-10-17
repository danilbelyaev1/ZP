<?php

namespace App\Controllers;

use \App\Helpers\Url;

/**
 * Class Menu
 * @package App\Controllers
 */
class Menu
{
	/**
	 * Получение меню шапки
	 *
	 * @return array
	 */
	public static function getHeader()
	{
		return self::getMenuItems('top');
	}

	/**
	 * Получение меню подвала
	 *
	 * @return array
	 */
	public static function getFooter()
	{
		$leftMenu = self::getMenuItems('footer_left');
		$rightMenu = self::getMenuItems('footer_right');

		return array_merge($leftMenu, $rightMenu);
	}

	/**
	 * Получение пунктов меню по его типу
	 *
	 * @param $typeMenu
	 * @return array
	 * @throws \Exception
	 */
	public static function getMenuItems($typeMenu)
	{
		global $APPLICATION;
		$items = [];

		$obMenu = $APPLICATION->GetMenu($typeMenu);
		if (empty($obMenu->arMenu)) {
			throw new \Exception("Меню для " . $typeMenu . " не найдено!");
		}

		foreach ($obMenu->arMenu as $itemMenu) {
			$items[] = [
				'name' => $itemMenu[0],
				'link' => Url::getFullUrl() . $itemMenu[1],
			];
		}

		return $items;
	}
}
