<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Добавление нового рецепта");
global $USER;

$cur_user_id = $USER->GetID();
$rsUser = CUser::GetByID($cur_user_id);
$arUser = $rsUser->Fetch();

if($USER->GetFirstName() === '' or $USER->GetLastName() === '') {
	$_SESSION['authError'] = 'Чтобы добавить рецепт необходимо заполнить обязательную информацию в личном кабинете.';
	LocalRedirect('/personal/', false, 301);
}

?>

<?$APPLICATION->IncludeComponent(
	"wms:wms.recipes.add",
	"edit",
	Array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "N",
		"IBLOCK_ID" => \Local\Core\Assistant\Iblock\Iblock::getIdByCode("content_sections","healthy_nutrition")
	)
);?>

<div class="modal fade" id="recipeSubmittedModeration" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h4 class="modal-title w-100" id="exampleModalLongTitle">Ваш рецепт отправлен на модерацию</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<p class="mb-40">Он будет опубликован, как только пройдет проверку</p>
				<div class="btn-wrap">
					<a href="/recipes/new/" class="btn btn-success me-3 mb-3">Добавить еще рецепт</a>
					<a href="/personal/" class="btn btn-outline-success  mb-3">Перейти в личный кабинет</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="recipeSubmittedDraft" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content text-center">
			<div class="modal-header">
				<h4 class="modal-title w-100" id="exampleModalLongTitleDraft">Ваш рецепт сохранен в черновиках</h4>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body ">
				<p class="mb-40">Как будете готовы - отправьте его на модерацию</p>
				<div class="btn-wrap">
					<a href="/recipes/new/" class="btn btn-success me-3 mb-3">Добавить еще рецепт</a>
					<a href="/personal/" class="btn btn-outline-success  mb-3">Перейти в личный кабинет</a>
				</div>
			</div>
		</div>
	</div>
</div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
