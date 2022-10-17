<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Угадайте фрукт");
?>

<section class="azbuka-section games">
	<div class="container">
		<div class="azbuka-game opened-category games main-page ugadaite-frykti">
			<div class="fullscreen-btn">
				<div class="fs-false">
					<svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M10.6875 3.49359H3.75C3.19687 3.49359 2.75 3.94047 2.75 4.49359V11.4936C2.75 11.7686 2.975 11.9936 3.25 11.9936H4.75C5.025 11.9936 5.25 11.7686 5.25 11.4936V5.99359H10.6875C10.9625 5.99359 11.1875 5.76859 11.1875 5.49359V3.99359C11.1875 3.71859 10.9625 3.49359 10.6875 3.49359ZM28.75 21.4936H27.25C26.975 21.4936 26.75 21.7186 26.75 21.9936V27.4936H21.3125C21.0375 27.4936 20.8125 27.7186 20.8125 27.9936V29.4936C20.8125 29.7686 21.0375 29.9936 21.3125 29.9936H28.25C28.8031 29.9936 29.25 29.5467 29.25 28.9936V21.9936C29.25 21.7186 29.025 21.4936 28.75 21.4936ZM10.6875 27.4936H5.25V21.9936C5.25 21.7186 5.025 21.4936 4.75 21.4936H3.25C2.975 21.4936 2.75 21.7186 2.75 21.9936V28.9936C2.75 29.5467 3.19687 29.9936 3.75 29.9936H10.6875C10.9625 29.9936 11.1875 29.7686 11.1875 29.4936V27.9936C11.1875 27.7186 10.9625 27.4936 10.6875 27.4936ZM28.25 3.49359H21.3125C21.0375 3.49359 20.8125 3.71859 20.8125 3.99359V5.49359C20.8125 5.76859 21.0375 5.99359 21.3125 5.99359H26.75V11.4936C26.75 11.7686 26.975 11.9936 27.25 11.9936H28.75C29.025 11.9936 29.25 11.7686 29.25 11.4936V4.49359C29.25 3.94047 28.8031 3.49359 28.25 3.49359Z" fill="#2B3F6C"/>
					</svg>
				</div>
				<div class="fs-true">
					<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path fill-rule="evenodd" clip-rule="evenodd" d="M22.0401 1.78424C22.4306 2.17476 22.4306 2.80793 22.0401 3.19845L3.18393 22.0546C2.79341 22.4452 2.16024 22.4452 1.76972 22.0546C1.3792 21.6641 1.3792 21.0309 1.76972 20.6404L20.6259 1.78424C21.0164 1.39372 21.6496 1.39372 22.0401 1.78424Z" fill="#2B3F6C"/>
						<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9599 21.784C21.5694 22.1745 20.9362 22.1745 20.5457 21.784L1.68949 2.9278C1.29897 2.53728 1.29897 1.90411 1.68949 1.51359C2.08001 1.12306 2.71318 1.12306 3.1037 1.51359L21.9599 20.3698C22.3504 20.7603 22.3504 21.3935 21.9599 21.784Z" fill="#2B3F6C"/>
					</svg>
				</div>
			</div>
			<div class="island-detail-wrapper">
				<div class="game-window">
					<div class="close">
						<a href="../">
							<svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" clip-rule="evenodd" d="M22.0401 1.78424C22.4306 2.17476 22.4306 2.80793 22.0401 3.19845L3.18393 22.0546C2.79341 22.4452 2.16024 22.4452 1.76972 22.0546C1.3792 21.6641 1.3792 21.0309 1.76972 20.6404L20.6259 1.78424C21.0164 1.39372 21.6496 1.39372 22.0401 1.78424Z" fill="#2B3F6C"></path>
								<path fill-rule="evenodd" clip-rule="evenodd" d="M21.9599 21.784C21.5694 22.1745 20.9362 22.1745 20.5457 21.784L1.68949 2.9278C1.29897 2.53728 1.29897 1.90411 1.68949 1.51359C2.08001 1.12306 2.71318 1.12306 3.1037 1.51359L21.9599 20.3698C22.3504 20.7603 22.3504 21.3935 21.9599 21.784Z" fill="#2B3F6C"></path>
							</svg>
						</a>
					</div>
					<div class="game-title">Угадайте фрукты</div>
					<div class="middle">
						<div data-id="0" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/apelsin.svg" alt="">
							<div class="fruit-name">Апельсин</div>
						</div>
						<div data-id="1" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/arbuz.svg" alt="">
							<div class="fruit-name">Арбуз</div>
						</div>
						<div data-id="2" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/banan.svg" alt="">
							<div class="fruit-name">Банан</div>
						</div>
						<div data-id="3" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/grusha.svg" alt="">
							<div class="fruit-name">Груша</div>
						</div>
						<div data-id="4" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/kivi.svg" alt="">
							<div class="fruit-name">Киви</div>
						</div>
						<div data-id="5" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/klubnika.svg" alt="">
							<div class="fruit-name">Клубника</div>
						</div>
						<div data-id="6" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/mango.svg" alt="">
							<div class="fruit-name">Манго</div>
						</div>
						<div data-id="7" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/persik.svg" alt="">
							<div class="fruit-name">Персик</div>
						</div>
						<div data-id="8" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/vinograd.svg" alt="">
							<div class="fruit-name">Виноград</div>
						</div>
						<div data-id="9" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/vishnya.svg" alt="">
							<div class="fruit-name">Вишня</div>
						</div>
						<div data-id="10" class="fruit-bg">
							<img  src="../../../layout/img/azbuka-game/fruit-game/yabloko.svg" alt="">
							<div class="fruit-name">Яблоко</div>
						</div>
					</div>
					<div class="bottom">
						<div data-id="0" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/apelsin.svg" alt="">
						</div>
						<div data-id="1" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/arbuz.svg" alt="">
						</div>
						<div data-id="2" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/banan.svg" alt="">
						</div>
						<div data-id="3" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/grusha.svg" alt="">
						</div>
						<div data-id="4" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/kivi.svg" alt="">
						</div>
						<div data-id="5" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/klubnika.svg" alt="">
						</div>
						<div data-id="6" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/mango.svg" alt="">
						</div>
						<div data-id="7" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/persik.svg" alt="">
						</div>
						<div data-id="8" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/vinograd.svg" alt="">
						</div>
						<div data-id="9" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/vishnya.svg" alt="">
						</div>
						<div data-id="10" class="fruit-drag">
							<img src="../../../layout/img/azbuka-game/fruit-game/bottom-fruits/yabloko.svg" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
