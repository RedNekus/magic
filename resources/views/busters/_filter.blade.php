<style>
	.catalog-filter .ui-slider-horizontal {
		height: 7px;
		background-color: #a8a8a8;
		border: none;
		margin: 1rem 0;
	}
	.catalog-filter .ui-state-default {
		background: #0271ab !important;
		border: none;
		width: 14px;
		height: 14px;
		top: -3.5px;
		margin-left: -7px;
		border-radius: 7px;
	}
	.filter-name-title {
		font-size: 1.2rem;
		margin-bottom: 0.375rem;
		display: inline-block;
	}
	.filter-name-value{
		display: flex;
		justify-content: space-between;
		margin-bottom: 1rem;
	}
	.filter-name-value > *:not(:empty) {
		border: 1px solid #bdbdbd;
	}
	.filter-name-value > * {
		font-size: 15px;
		color: #6b94a0;
		min-width: 70px;
		padding: 4px;
		display: inline-block;
		text-align: center;
		min-height: 28px;
	}
	
	.catalog-filter .labels {
		position: relative;
		margin-top: 10px;
		height: 15px;
		font-size: 9px;
		color: #cbcbcb;
	}
	.catalog-filter .labels .labelValue {
		display: block;
		text-align: center;
		position: absolute;
		transform: translate(-50%, 0);
	}
	.ui-widget-header:last-child{
		background: #0271ab;
	}
	form .catalog-filter:last-child {
		margin: 1.5rem 0;
	}
	form .catalog-filter:last-child .row {
		align-items: center;
	}
	.catalog-filter-col-check {
		display: flex;
	}
	.catalog-filter-check {
		margin-right: 1rem;
	}
	.catalog-filter-check label {
		display: flex;
		margin: 0;
		align-items: center;
		color: #a8a8a8;
		cursor: pointer;
	}
	.catalog-filter-check input {
		display: none;
	}
	.checkbox-icon {
		display: inline-block;
		width: 20px;
		height: 20px;
		border: 1px solid #cbcbcb;
		border-radius: 5px;
		background-color: #ffffff;
		vertical-align: top;
		margin-right: 10px;
	}
	.checkbox-custom:checked + label {
		color: #2c2c2c;
	}
	.checkbox-custom:checked + label .checkbox-icon {
		border: 1px solid #2c2c2c;
		background: #fff url("../images/checkbox-check.png") center center no-repeat;
	}
	.catalog-filter-sort-label {
		display: inline-block;
	}
	.catalog-filter-col-sort {
		display: flex;
	}
	.catalog-filter-sort {
		margin-right: 10px;
		color: #a8a8a8;
	}
	.catalog-filter-sort.active {
		color: #2c2c2c;
	}
	.catalog-filter-sort:hover {
		text-decoration: none;
		color: #2c2c2c;
	}
	.catalog-filter-sort:after {
		content: "↑";
		padding-left: 0.375rem;
	}
	
	.btn-filter {
		width: 200px;
		text-align: center;
		background: #0271ab;
		font-size: 16px;
		padding: 10px 0px;
		border: none;
		color: white;
		cursor: pointer;
	}

	.mobile-filter-show-panel {
		height: 60px;
		line-height: 60px;
		color: #ffffff;
		font-size: 18px;
		font-weight: bold;
		background: #0271ab;
		padding: 0 15px;
		position: relative;
	}
	.filter-show-panel-btn {
		width: 35px;
		height: 35px;
		border: 1px solid white;
		border-radius: 5px;
		background: url("../images/filter-show-panel-btn.png") center center no-repeat;
		position: absolute;
		top: 12px;
		right: 15px;
	}
	@media (max-width: 991px) {
		.catalog-filter-col-sort-box {
			margin: 1rem 0;
		}
	}
	@media (max-width: 767px) {
		.catalog-filter-col-check {
			justify-content: center;
		}
		.catalog-filter-col-sort {
			justify-content: center;
		}
		form .catalog-filter:last-child .row > *:last-child {
			display: flex;
			justify-content: center;
		}
	}
	@media (min-width: 768px) {
		.dont-collapse-md {
			display: block!important;
		}
	}
</style>
{{ Form::open(['url' => '/'.$sname.'/filter', 'id' => 'filter_busters', 'class' => 'catalog-filter-box']) }}
	<div class="mobile-filter-show-panel d-md-none">
		Фильтр поиска
		<div class="filter-show-panel-btn" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"></div>
	</div>
	<div class="collapse dont-collapse-md" id="collapseExample">
		<div class="row catalog-filter" id="collapseExample">
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					<span class="filter-name-title">Цена:</span>
					<span class="filter-name-value">
						<span id="priceVal_1">0</span>
						<span id="priceVal_2">312</span>
					</span>
				</div>
				<div id="filterSliderPrice" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 62.4%;"></span>
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 62.4%;"></div>
				</div>
				<input type="hidden" name="price_from" value="0.00">
				<input type="hidden" name="price_to" value="312.00">
			</div>
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					<span class="filter-name-title">Игроков:</span>
					<span class="filter-name-value">
						<span id="gamersVal_1"></span>
						<span id="gamersVal_2"></span>
					</span>
				</div>
				<div id="filterSliderGamers" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
				</div>
				<div class="labels labelGamers">
					<span class="labelValue" style="left:0%;">0</span>
					<span class="labelValue" style="left:11.111111111111%;">1</span>
					<span class="labelValue" style="left:22.222222222222%;">2</span>
					<span class="labelValue" style="left:33.333333333333%;">3</span>
					<span class="labelValue" style="left:44.444444444444%;">4</span>
					<span class="labelValue" style="left:55.555555555556%;">5</span>
					<span class="labelValue" style="left:66.666666666667%;">6</span>
					<span class="labelValue" style="left:77.777777777778%;">7</span>
					<span class="labelValue" style="left:88.888888888889%;">8</span>
					<span class="labelValue" style="left:100%;">8+</span>
				</div>
				<input type="hidden" name="gamers_from" value="0">
				<input type="hidden" name="gamers_to" value="9">
			</div>
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					<span class="filter-name-title">Возраст:</span>
					<span class="filter-name-value">
						<span id="ageVal_1"></span>
						<span id="ageVal_2"></span>
					</span>
				</div>
				<div id="filterSliderAge" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
				<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div></div>
				<div class="labels labelAge">
					<span class="labelValue" style="left:0%;">0</span>
					<span class="labelValue" style="left:11.111111111111%;">2</span>
					<span class="labelValue" style="left:22.222222222222%;">4</span>
					<span class="labelValue" style="left:33.333333333333%;">6</span>
					<span class="labelValue" style="left:44.444444444444%;">8</span>
					<span class="labelValue" style="left:55.555555555556%;">10</span>
					<span class="labelValue" style="left:66.666666666667%;">12</span>
					<span class="labelValue" style="left:77.777777777778%;">14</span>
					<span class="labelValue" style="left:88.888888888889%;">16</span>
					<span class="labelValue" style="left:100%;">18+</span>
				</div>
				<input type="hidden" name="age_from" value="0">
				<input type="hidden" name="age_to" value="19">
			</div>
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					<span class="filter-name-title">Время игры:</span>
					<span class="filter-name-value">
						<span id="timeVal_1"></span>
						<span id="timeVal_2"></span>
					</span>
				</div>
				<div id="filterSliderTime" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 100%;"></span>
				<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div></div>
				<div class="labels labelTime">
					<span class="labelValue" style="left:0%;">0</span>
					<span class="labelValue" style="left:25%;">60</span>
					<span class="labelValue" style="left:50%;">120</span>
					<span class="labelValue" style="left:75%;">180</span>
					<span class="labelValue" style="left:100%;">240+</span>
				</div>
				<input type="hidden" name="time_from" value="0">
				<input type="hidden" name="time_to" value="240">
			</div>
		</div>
		<div class="catalog-filter">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12 catalog-filter-col-check">
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox1" class="checkbox-custom" value="Y" name="hit">
						<label for="catalog-filter-checkbox1"><span class="checkbox-icon"></span>Хит</label>
					</div>
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox2" class="checkbox-custom" value="Y" name="new">
						<label for="catalog-filter-checkbox2"><span class="checkbox-icon"></span>Новинка</label>
					</div>
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox3" class="checkbox-custom" value="Y" name="newprice">
						<label for="catalog-filter-checkbox3"><span class="checkbox-icon"></span>Скидка</label>
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-12 catalog-filter-col-sort">
					<div class="catalog-filter-col-sort-box">
						<a class="catalog-filter-sort" href="#" >По цене</a>
						<a class="catalog-filter-sort active" href="#">По названию</a>
						<a class="catalog-filter-sort" href="#">Без сортировки</a>
					</div>
				</div>
				<div class="col-lg-3 col-12 text-right">
					<button class="btn-filter">Показать</button>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}