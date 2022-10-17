<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("Калькулятор калорийности продуктов");
//$APPLICATION->AddChainItem("Сервисы", "/services/");
$productIds = \Local\Core\Assistant\Iblock\Iblock::getIdByCode('SERVICES', 'PRODUCTS');
$arSelect = array("ID", "NAME", "PROPERTY_WATER", "PROPERTY_PROTEINS", "PROPERTY_FATS", "PROPERTY_CARBOHYDRATES", "PROPERTY_KKAL");
$arFilter = array("IBLOCK_ID" => $productIds, "ACTIVE_DATE" => "Y", "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array("NAME" => "ASC"), $arFilter, false, array(), $arSelect);
while ($ob = $res->GetNextElement()) {
	$arProducts[] = $ob->GetFields();
}

?>
<section class="calc-section">
	<div class="container">
		<div class="bx-breadcrumb" itemscope="" itemtype="http://schema.org/BreadcrumbList">
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_0" itemprop="itemListElement" itemscope=""
				 itemtype="http://schema.org/ListItem">

				<a href="/" title="Главная" itemprop="item">
					<span itemprop="name">Главная</span>
				</a>
				<meta itemprop="position" content="1">
			</div>
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_1" itemprop="itemListElement" itemscope=""
				 itemtype="http://schema.org/ListItem">
				<i class="fa fa-angle-right"></i>
				<a href="/services/" title="Сервисы" itemprop="item">
					<span itemprop="name">Сервисы</span>
				</a>
				<meta itemprop="position" content="2">
			</div>
			<div class="bx-breadcrumb-item" id="bx_breadcrumb_2" itemprop="itemListElement" itemscope=""
				 itemtype="http://schema.org/ListItem">
				<i class="fa fa-angle-right"></i>
				<a href="/services/calculators/" title="Наши калькуляторы" itemprop="item">
					<span itemprop="name">Наши калькуляторы</span>
				</a>
				<meta itemprop="position" content="3">
			</div>
			<div class="bx-breadcrumb-item">
				<i class="fa fa-angle-right"></i>
				<span>Рассчитайте калорийность блюда</span>
			</div>
		</div>
		<h1 class="h2 mb-40">Рассчитайте калорийность блюда</h1>
		<p class="h5 medium mb-40">Узнайте сколько калорий содержит ваш любимый рецепт!</p>
		<form class="calc-form" action="#">
			<div class="w-100 calc-row-group">
				<div class="row calc-row mb-3">
					<div class="col-md-6 mb-2">
						<div class="select-wrap">
							<select class="select-primary-search ">
								<? foreach ($arProducts as $product): ?>
									<option
										value="<?= $product["PROPERTY_KKAL_VALUE"] ?>"><?= $product["NAME"] ?></option>
								<? endforeach; ?>
							</select>
						</div>
					</div>
					<div class="col-md-4 mb-2">
						<div class="w-100 position-relative">
							<input class="form-control input-number"
								   type="number"
								   min="1"
								   max="1000"
								   step="1"
								   value="1"
							>
							<input class="form-range input-range"
								   type="range"
								   min="1"
								   max="1000"
								   step="1"
								   value="1"
							>
							<p class="text-gray">грамм</p>
						</div>
					</div>
					<div class="col-md-2 mb-2">
						<div class="w-100 position-relative">
							<div class=" control-autosize-wrap calc-result">
								<p class="value-text">-</p>
								<p class="text-gray">ккал</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-100 mb-40">
				<button id="addingridient" type="button" class="btn btn-outline-success">Добавить ингредиент
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path class="success"
							  d="M0 12C0 5.37258 5.37258 0 12 0C18.6274 0 24 5.37258 24 12C24 18.6274 18.6274 24 12 24C5.37258 24 0 18.6274 0 12Z"
							  fill="#A6D363"></path>
						<path
							d="M12 6C12.1989 6 12.3897 6.07902 12.5303 6.21967C12.671 6.36032 12.75 6.55109 12.75 6.75V11.25H17.25C17.4489 11.25 17.6397 11.329 17.7803 11.4697C17.921 11.6103 18 11.8011 18 12C18 12.1989 17.921 12.3897 17.7803 12.5303C17.6397 12.671 17.4489 12.75 17.25 12.75H12.75V17.25C12.75 17.4489 12.671 17.6397 12.5303 17.7803C12.3897 17.921 12.1989 18 12 18C11.8011 18 11.6103 17.921 11.4697 17.7803C11.329 17.6397 11.25 17.4489 11.25 17.25V12.75H6.75C6.55109 12.75 6.36032 12.671 6.21967 12.5303C6.07902 12.3897 6 12.1989 6 12C6 11.8011 6.07902 11.6103 6.21967 11.4697C6.36032 11.329 6.55109 11.25 6.75 11.25H11.25V6.75C11.25 6.55109 11.329 6.36032 11.4697 6.21967C11.6103 6.07902 11.8011 6 12 6Z"
							fill="white"></path>
					</svg>
				</button>
			</div>
			<div class="calc-form__result">
				<div class="item" id="weight">
					<p class="text">Итоговый вес блюда</p>
					<p class="result text-success">
						<data>0</data>
						<span class="text-dark">Грамм</span></p>
				</div>
				<div class="item" id="ccaltotal">
					<p class="text">Количество калорий в блюде</p>
					<p class="result text-danger">
						<data>0</data>
						<span class="text-dark">Ккал</span></p>
				</div>
				<div class="item" id="ccal">
					<p class="text">Количество калорий на 100 г</p>
					<p class="result text-danger">
						<data>0</data>
						<span class="text-dark">Ккал</span></p>
				</div>
			</div>
		</form>
	</div>
</section>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />-->
<script>
	var rounded = function (number) {
		return +number.toFixed(2);
	}

	function recalc(elem) {
		let row = $(elem).closest('.calc-row');
		let product = parseInt($(row).find('.select-primary-search').find(":selected").val());
		let weight = parseInt($(row).find('.input-number').val());
		let result = (product / 100) * weight;
		if(isNaN(result)){
			result = 1
		}
		$(row).find('.calc-result p.value-text').html(rounded(result));
		var totalweight = 0;
		var totalccal = 0;
		$('.calc-row').each(function () {
			totalweight += parseInt($(this).find('.input-number').val());
			totalccal += parseInt($(this).find('.calc-result p.value-text').text());

		});
		$('#weight').find('.result data').html(rounded(totalweight));
		$('#ccaltotal').find('.result data').html(rounded(totalccal));
		$('#ccal').find('.result data').html(rounded(totalccal / totalweight * 100));
	}

	window.onload = function () {
		// инициализация select-primary-search
		$('.select-primary-search').select2({
			theme: "select-primary",
			templateSelection: function (data) {
				if (data.id === 'choose-ingredient') {
					return 'Выберите ингредиент';
				}
				return data.text;
			},
			sorter: function (results) {
				var query = $('.select2-search__field').val().toLowerCase();
				return results.sort(function (a, b) {
					return a.text.toLowerCase().indexOf(query) -
						b.text.toLowerCase().indexOf(query);
				});
			},
			"language": {
				"noResults": function () {
					return "Результаты не найдены";
				}
			}
		});

		//Калькулятор калорий
		if ($('.calc-form').length !== 0) {

			$('input').on('input', function () {
				recalc($(this));
			});
			$('select').on('change', function () {
				recalc($(this));
			})
			$('#addingridient').click(function () {
				$('.calc-row').each(function (elem) {
					$(elem).find(".select2").each(function (index) {
						$(this).select2('destroy');
					});
				});
				let clone = $('.calc-row').last().clone();
				clone.find("span").remove();
				clone.appendTo('.calc-row-group');
				$(".select-primary-search").select2({
					theme: "select-primary",
					templateSelection: function (data) {
						if (data.id === 'choose-ingredient') {
							return 'Выберите ингредиент';
						}
						return data.text;
					},
					sorter: function (results) {
						var query = $('.select2-search__field').val().toLowerCase();
						return results.sort(function (a, b) {
							return a.text.toLowerCase().indexOf(query) -
								b.text.toLowerCase().indexOf(query);
						});
					}
				});
				$('.calc-row').children().change(function () {
					recalc($(this));
				});
				let inputs = clone.find('input.input-range')
				inputs.each((i,input) => {
					input.addEventListener('input', handleInputChange)
				})

				inputs = clone.find('input.input-number')
				inputs.each((i,input) => {
					input.addEventListener('input', handleInputChange)
				})
			})
		}


		function bundleInput() {
			$('.input-range, .input-number').on('input', function () {
				$(this).siblings('.input-range, .input-number').val(this.value);
			});
		}

		// bundleInput()

		$('#addingridient').click(function () {
			// bundleInput()
		});

		// заполняемость
		const rangeInputs = document.querySelectorAll('input[type="range"], .input-number ')
		function handleInputChange(e) {
			let target = e.target
			let range = $(target)
			let numberInput = range
			let isRange = true

			if (range.attr('type') !== 'range') {
				range = range.closest('.calc-row').find('input[type="range"]')[0]
				isRange = false
			}else {
				numberInput = $(target).closest('.calc-row').find('input.input-number')[0]
			}

			const min = target.min
			const max = target.max
			const val = target.value
			let percent = (val - min) * 100 / (max - min)
			if (percent < 0 || isNaN(percent) ){
				percent = 0
				range = 0
			}else if(percent > 100){
				percent = 100
			}
			range = $(range)
			range.css('backgroundSize', percent + '% 100%')

			if (!isRange){
				$(range).val(val)
			}else {
				$(numberInput).val(val)
			}
		}
		rangeInputs.forEach(input => {
			input.addEventListener('input', handleInputChange)
		})
	}
</script>

</section> <? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
