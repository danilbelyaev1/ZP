<?php
define('NO_KEEP_STATISTIC', 'Y');
define('NO_AGENT_STATISTIC', 'Y');
define('NO_AGENT_CHECK', true);
define('DisableEventsCheck', true);
define('STOP_STATISTICS', true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");

use \Local\Core\Ajax\Exception;

$app = \Bitrix\Main\Application::getInstance();

$obRequest = $app->getContext()->getRequest();
$arRequest = $obRequest->getPostList()->toArray();
$obResponse = new \Local\Core\Inner\BxModified\HttpResponse();

try {

    if($arRequest['auth']){

        if(is_null($arRequest['login']) || $arRequest['login'] === '') throw new \Exception('Доступ запрещен');
        if(is_null($arRequest['password']) || $arRequest['password'] === '') throw new \Exception('Доступ запрещен');

        $arSecurityRoutes = include __DIR__.'/securityRoutes.php';
        foreach ($arSecurityRoutes as $strRouteKey => $arRoute) {

            if(is_null($arRoute['auth']) || $arRoute['auth'] === '') throw new \Exception('Авторизация по роуту запрещена');
            if(is_null($arRoute['authGroup']) || $arRoute['authGroup'] === '' || !is_numeric($arRoute['authGroup'])) throw new \Exception('Не передан обязательный параметр ID группы');

            $strRegex = '/^\/wms\/ajax'.addcslashes($arRoute['path'], '/-\\').'/';
            if (preg_match($strRegex, urldecode($obRequest->getRequestUri()), $arMatches) === 1) {

                $rsUser = CUser::GetByLogin($arRequest['login']);
                $arUser = $rsUser->Fetch();
                if(!$arUser) throw new \Exception('Доступ запрещен');
                if (!in_array($arRoute['authGroup'],CUser::GetUserGroup($arUser['ID']))) throw new \Exception('Доступ запрещен');

                if(!\Local\Core\Assistant\User::isUserPassword($arUser['ID'], $arRequest['password'])) throw new \Exception('Пароль не верен');

            }
        }

    } elseif (!check_bitrix_sessid()) {
        throw new \Exception('Доступ запрещен');
    }

    $arRoutes = include __DIR__.'/routes.php';

    foreach ($arRoutes as $strRouteKey => $arRoute) {

        if (empty($arRoute['path'])) {
            throw new Exception\StructurePathNotExistException($strRouteKey);
        }

        $strRegex = '/^\/wms\/ajax'.addcslashes($arRoute['path'], '/-\\').'/';

        if (!empty($arRoute['args'])) {
            $arReplace = [];
            foreach ($arRoute['args'] as $k => $v) {
                $arReplace['{'.$k.'}'] = $v;
            }

            $strRegex = str_replace(array_keys($arReplace), array_values($arReplace), $strRegex);
        }

        if (preg_match($strRegex, urldecode($obRequest->getRequestUri()), $arMatches) === 1) {
            $isContinue = false;
            if (!empty($arRoute['methods']) && is_array($arRoute['methods'])) {
                $isContinue = !in_array($obRequest->getRequestMethod(), $arRoute['methods']);
            }

            if ($isContinue) {
                continue;
            }
            if (!empty($arRoute['args'])) {
                unset($arMatches[0]);
                $arMatches = array_values($arMatches);
            }

            $arParams = [];
            if (!empty($arRoute['args'])) {
                $arParams = array_combine(array_keys($arRoute['args']), $arMatches);
            }

            if (empty($arRoute['handler'])) {
                throw new Exception\StructureHandlerNotExistException($strRouteKey);
            }

            list($strClass, $strMethod) = explode('::', $arRoute['handler']);
            if (empty($strClass) || empty($strMethod) || !class_exists($strClass) || !method_exists($strClass, $strMethod)) {
                throw new Exception\MethodNotExistException($strRouteKey);
            }

            $strClass::$strMethod($obRequest, $obResponse, $arParams);

            $GLOBALS['APPLICATION']->RestartBuffer();
            $obResponse->send();
            die();
        }
    }

    throw new Exception\RouteNotFoundException();

} catch (\Throwable $e) {
    $GLOBALS['APPLICATION']->RestartBuffer();
    $obResponse->setContentJson(
        ["error" => 'Exception: '.get_class($e).'; Error: '.$e->getMessage()],
        405
    );
    $obResponse->send();
    die();
}
