<?php

namespace App\Helpers;

/**
 * Class Url
 * @package App\Helpers
 */
class Url
{
	/**
	 * Полный путь к сайту
	 *
	 * @param $uri
	 * @return string
	 */
	public static function getFullUrl($uri = '')
	{
		return (\CMain::IsHTTPS() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $uri;
	}

	public static function checkURL($url){
		$urlHeaders = @get_headers($url);
		// проверяем ответ сервера на наличие кода: 200 - ОК
		if(strpos($urlHeaders[0], '200')) {
			return true;
		} else {
			return false;
		}
	}
}
