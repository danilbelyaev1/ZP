<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест");
?>

<?$APPLICATION->IncludeComponent(
    "wms:wms.lesson.testing.detail",
    "",
    Array(
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "N",
        "ELEMENT_ID" => "",
        "IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("school","lesson-testing"),
        "SECTION_ID" => ""
    )
);?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
