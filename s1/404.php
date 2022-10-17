<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Поиск");
?>
<section class="error-section">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-md-5 mb-3">
				<h3 class="mb-4">Произошла ошибка</h3>
				<h4 class="medium mb-4">Запрошенная страница <span class="d-block">не существует</span></h4>
				<div class="btn-wrap"><a href="/" class="btn btn-success">На главную</a></div>
			</div>
			<div class="col-md-7">
				<img src="/layout/img/img-404.jpg" alt="404">
			</div>
		</div>

	</div>
</section>
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
