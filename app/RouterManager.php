<?php

namespace App;

use \Bitrix\Main\Application;
use \Bitrix\Main\Web\Json;
use \Bitrix\Main\Loader;

/**
 * Class RouterManager
 */
class RouterManager
{
	/**
	 * Начальная точка роутинга
	 *
	 * @throws \Exception
	 */
	public static function init()
	{
		$class = "";
		$method = "";
		$result = null;

		$routes = self::getRouters();

		$request = Application::getInstance()->getContext()->getRequest();
		$uriString = $request->getRequestUri();
		$params = !empty($request->getQueryList()->toArray()) ? $request->getQueryList()->toArray() : [];

		foreach ($routes as $key => $value) {
			if (strpos($uriString, $key) === 0) {
				$class = $value["class"];
				$method = $value["method"];
			}
		}

		if (empty($class) || empty($method)) {
			throw new \Exception("Не найден контроллер для роута " . $uriString);
		}

		$controllerClassName = "App\\Controllers\\" . $class;
		if (class_exists($controllerClassName) && method_exists($controllerClassName, $method)) {
			self::initModules();
			$controller = new $controllerClassName;
			$result = $controller->{$method}($params);
		} else {
			throw new \Exception("Не найден контроллер для роута " . $uriString);
		}

		self::cors();
		header('Content-Type: application/json; charset=utf-8');
		echo Json::encode($result, JSON_UNESCAPED_UNICODE);
	}

	/**
	 * Список всех роутов с соответствующими классами и методами
	 *
	 * @return array
	 */
	protected static function getRouters()
	{
		return [
			"/api/news/list/" => ["class" => "News", "method" => "getAll"],
			"/api/news/html/" => ["class" => "News", "method" => "getHtml"],
			"/api/news/css/" => ["class" => "News", "method" => "getCss"],
			"/api/news/js/" => ["class" => "News", "method" => "getJs"],
			"/api/news/php/" => ["class" => "News", "method" => "getPhp"],

			"/api/menu/header/" => ["class" => "Menu", "method" => "getHeader"],
			"/api/menu/footer/" => ["class" => "Menu", "method" => "getFooter"],
		];
	}

	/**
	 * Заголовки для CORS
	 */
	static function cors()
	{
		// Allow from any origin
		if (isset($_SERVER['HTTP_ORIGIN'])) {
			header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
			header('Access-Control-Allow-Credentials: true');
			header('Access-Control-Max-Age: 86400');
		}

		// Access-Control headers are received during OPTIONS requests
		if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
				header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");

			if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
				header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

			exit(0);
		}
	}

	/**
	 * Подключаем модули
	 */
	static function initModules()
	{
		Loader::includeModule('iblock');
	}
}
