</main>
<footer>
	<div class="container">
		<div class="f-hr"></div>
		<div class="d-flex flex-row">
		<a href="https://национальныепроекты.рф/projects/demografiya?ysclid=l8lhuximkp43094488" target="_blank" alt="Демография- Национальные Проекты России">
			<img class="h-logo__demography" src="/layout/img/logo/logo-demography.png" alt="Демография- Национальные Проекты России">
		</a>
		<a href="/" class="f-logo">
			<span class="f-logo__hr"></span>
			<img class="f-logo__logo" src="/layout/img/logo/logo-small.png" alt="Здоровое питание">
			<span class="f-logo__text">Федеральная служба по надзору
               в сфере защиты прав потребителя и благополучия человека
            </span>
		</a>
		</div>
		<div class="f-app">
			<img class="f-app__android" src="/layout/img/android.svg" alt="Андроид">
			<div class="f-app__r">
				<p class="f-app__r--text">Демонстрационная версия мобильного приложения «Здоровое питание»</p>
				<a target="_blank" href="/local/templates/refactor/data/app-release.apk" class="btn btn-success">Скачать</a>
			</div>
		</div>
		<div class="f-texts">
			<p class="f-texts__text">Национальный проект <a href="#">«Демография»</a>
				<br class="d-sm-none">
				Федеральный проект <a href="#">«Укрепление общественного здоровья»</a></p>
			<p class="f-texts__text">«Федеральная служба по надзору в сфере защиты прав потребителей и благополучия человека», 2019</p>
			<p class="f-texts__text">Адрес: 127994, г. Москва, Вадковский переулок, дом 18, строение 5 и 7.
				<span class="d-block">+7 (499) 973-26-90</span></p>
			<ul class="g-social mb-0">
				<li><a target="_blank" href="https://vk.com/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-vk.svg" alt="Вконтакте"></a></li>
				<li><a target="_blank" href="https://ok.ru/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-od.svg" alt="Одноклассники"></a></li>
				<li><a target="_blank" href="https://vb.me/rpnzdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-vb.svg" alt="Вайбер"></a></li>
				<li><a target="_blank" href="https://t.me/rpn_zdorovoepitanie" class="g-social__ic"><img src="/layout/img/soc-tl.svg" alt="Телеграмм"></a></li>
			</ul>
		</div>

		<a target="_blank" class="f-privacy-policy" href="/policy.pdf">Политика конфиденциальности</a>
	</div>
	<?
	global $APPLICATION;
	$APPLICATION->IncludeComponent("bitrix:main.include", "", array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"AREA_FILE_RECURSIVE" => "N",
			"PATH" => SITE_TEMPLATE_PATH . "/include/modal-auth-form.php"
		)
	);
	?>
</footer>
<!-- Modal -->

<?if($APPLICATION->GetCurPage(false) == '/rasstroistva-pischevogo-povedeniya/'):?>
<div class="modal fade" id="askQuestionModal" tabindex="-1" aria-labelledby="askQuestionModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="m-0	" id="askQuestionModalLabel">Задать вопрос</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:main.feedback",
				"rpp",
				array(
					"USE_CAPTCHA" => "N",
					"AJAX_MODE" => "Y",  // режим AJAX
					"AJAX_OPTION_SHADOW" => "N", // затемнять область
					"AJAX_OPTION_JUMP" => "N", // скроллить страницу до компонента.
					"AJAX_OPTION_STYLE" => "Y", // подключать стили
					"AJAX_OPTION_HISTORY" => "N",
					"OK_TEXT" => "Спасибо, ваше сообщение отправлено.",
					"EMAIL_TO" => COption::GetOptionString("main","email_from"),
					"REQUIRED_FIELDS" => array(
						0 => "NAME",
						1 => "EMAIL",
						2 => "MESSAGE",
					),
					"EVENT_MESSAGE_ID" => array(
						0 => "7",
					),
					"COMPONENT_TEMPLATE" => "rpp"
				),
				false
			);
			?>
		</div>
	</div>
</div>
<?endif;?>
</body>
</html>
