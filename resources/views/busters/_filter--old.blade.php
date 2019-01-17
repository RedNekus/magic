<style>
.catalog-filter-box{
	padding: 1rem;
}
.catalog-filter-range-col{
    padding-left: 20px;
    padding-right: 20px;
}
.catalog-filter .ui-state-default {
    background: #ffffff !important;
    border: 5px solid #0271ab !important;
    cursor: pointer;
    -webkit-border-radius: 10px !important;
    -moz-border-radius: 10px !important;
    border-radius: 10px !important;
    width: 18px !important;
    height: 18px !important;
    margin-left: -0.35em !important;
    top: -0.35em !important;
}
.catalog-filter .ui-state-default:hover{
    //background: #ff3d42 !important;
    //border-color: #ff7800 !important;
}
.catalog-filter .ui-slider-horizontal {
    height: 0.4em;
}
.catalog-filter .ui-widget-content {
    border: 0 none;
}
.catalog-filter .filter-name {
    color: #a5a5a5;
    margin-bottom: 10px;
    position: relative;
}
.catalog-filter .filter-name .filter-name-value {
    font-weight: bold;
    color: #2c2c2c;
    margin-left: 5px;
}
.catalog-filter-col-check{
    padding-top: 37px;
}
.catalog-filter-col-sort{
    padding-top: 33px;
    text-align: center;
}
.catalog-filter-check {
    float: left;
    margin-right: 28px;
}
.catalog-filter-check:nth-child(3){
    margin-right: 0;
}
.btn-filter {
    background: #ffffff;
    border: 3px solid #0271ab;
    border-radius: 10px;
    color: #0271ab;
    cursor: pointer;
    font-size: 18px;
    height: 50px;
    line-height: 44px;
    margin-top: 22px;
    width: 150px;
    -webkit-box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.09);
    -moz-box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.09);
    box-shadow: 3px 3px 5px rgba(0, 0, 0, 0.09);
    float: right;
    display: block;
}
.catalog-filter-2,.catalog-filter-2 a{
    color: #a5a5a5;
}
.catalog-filter .labels {
    position: relative;
    margin-top: 10px;
    height: 15px;
    font-size: 9px;
    color: #cbcbcb;
    font-weight: normal;
    font-family: sans-serif;
}
.catalog-filter .labels .labelValue {
    display: block;
    text-align: center;
    position: absolute;
    transform: translate(-50%, 0);
}
.checkbox-custom{
    display: none;
}
.checkbox-icon{
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 1px solid #cbcbcb;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background-color: #ffffff;
    vertical-align: top;
    margin-right: 10px;
}

.checkbox-custom:checked + label{
    color: #2c2c2c;
}
.checkbox-custom:checked + label .checkbox-icon{
    border: 1px solid #2c2c2c;
    background: #fff url("../images/checkbox-check.png") center center no-repeat;
}
.catalog-filter-sort-label{
    display: inline-block;
    line-height: 28px;
}
.catalog-filter-sort{
    display: inline-block;
    line-height: 26px;
    height: 30px;
    padding: 0 9px;
    border: 1px solid #cbcbcb;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    margin-left: 5px;
}
.catalog-filter-sort.active{
    border: 1px solid #2c2c2c;
    color: #2c2c2c;
}
.catalog-filter-sort:hover,.catalog-filter-sort:focus{
    text-decoration: none;
    outline: none;
}
.mobile-filter-show-panel {
    height: 60px;
    line-height: 60px;
    color: #ffffff;
    font-size: 18px;
    font-weight: bold;
    background: #0271ab;
    padding: 0 15px;
    margin: -15px!important;
}
.filter-show-panel-btn {
    width: 35px;
    height: 35px;
    //border: 1px solid #e39b00;
	border: 1px solid white;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    background: url("../images/filter-show-panel-btn.png") center center no-repeat;
    position: absolute;
    top: 12px;
    right: 15px;
}
.filter-show-panel-btn:hover {
    //background-color: #d89300;
}
.filter-show-panel-btn-close {
    background-image: url("../images/close-icon.png");
}

.ui-widget-header:last-child{
    background: #0271ab;
}
.ui-slider {
	position: relative;
	text-align: left;
}
.ui-slider .ui-slider-handle {
	position: absolute;
	z-index: 2;
	width: 1.2em;
	height: 1.2em;
	cursor: default;
	-ms-touch-action: none;
	touch-action: none;
}
.ui-slider .ui-slider-range {
	position: absolute;
	z-index: 1;
	font-size: .7em;
	display: block;
	border: 0;
	background-position: 0 0;
}
/* support: IE8 - See #6727 */
.ui-slider.ui-state-disabled .ui-slider-handle,
.ui-slider.ui-state-disabled .ui-slider-range {
	filter: inherit;
}
.ui-slider-horizontal {
	height: .8em;
}
.ui-slider-horizontal .ui-slider-handle {
	top: -.3em;
	margin-left: -.6em;
}
.ui-slider-horizontal .ui-slider-range {
	top: 0;
	height: 100%;
}
.ui-slider-horizontal .ui-slider-range-min {
	left: 0;
}
.ui-slider-horizontal .ui-slider-range-max {
	right: 0;
}
.ui-slider-vertical {
	width: .8em;
	height: 100px;
}
.ui-slider-vertical .ui-slider-handle {
	left: -.3em;
	margin-left: 0;
	margin-bottom: -.6em;
}
.ui-slider-vertical .ui-slider-range {
	left: 0;
	width: 100%;
}
.ui-slider-vertical .ui-slider-range-min {
	bottom: 0;
}
.ui-slider-vertical .ui-slider-range-max {
	top: 0;
}
/* Component containers
----------------------------------*/
.ui-widget .ui-widget {
	font-size: 1em;
}
.ui-widget input,
.ui-widget select,
.ui-widget textarea,
.ui-widget button {
	font-family: Verdana,Arial,sans-serif;
	font-size: 1em;
}
.ui-widget-content {
	border: 1px solid #aaaaaa;
	background: #ffffff;
	color: #222222;
}
.ui-widget-content a {
	color: #222222;
}
.ui-widget-header {
	border: 1px solid #aaaaaa;
	background: #cccccc;
	color: #222222;
	font-weight: bold;
}
.ui-widget-header a {
	color: #222222;
}
/* Interaction states
----------------------------------*/
.ui-state-default,
.ui-widget-content .ui-state-default,
.ui-widget-header .ui-state-default {
	border: 1px solid #d3d3d3;
	background: #e6e6e6;
	font-weight: normal;
	color: #555555;
}
.ui-state-default a,
.ui-state-default a:link,
.ui-state-default a:visited {
	color: #555555;
	text-decoration: none;
}
.ui-state-hover,
.ui-widget-content .ui-state-hover,
.ui-widget-header .ui-state-hover,
.ui-state-focus,
.ui-widget-content .ui-state-focus,
.ui-widget-header .ui-state-focus {
	border: 1px solid #999999;
	background: #dadada;
	font-weight: normal;
	color: #212121;
}
.ui-state-hover a,
.ui-state-hover a:hover,
.ui-state-hover a:link,
.ui-state-hover a:visited,
.ui-state-focus a,
.ui-state-focus a:hover,
.ui-state-focus a:link,
.ui-state-focus a:visited {
	color: #212121;
	text-decoration: none;
}
.ui-state-active,
.ui-widget-content .ui-state-active,
.ui-widget-header .ui-state-active {
	border: 1px solid #aaaaaa;
	background: #ffffff;
	font-weight: normal;
	color: #212121;
}
.ui-state-active a,
.ui-state-active a:link,
.ui-state-active a:visited {
	color: #212121;
	text-decoration: none;
}

@-ms-viewport {
    width: device-width
}
.visible-xl, .visible-lg, .visible-md, .visible-sm, .visible-xs {
    display: none !important
}

.visible-xl-block, .visible-xl-inline, .visible-xl-inline-block, .visible-lg-block, .visible-lg-inline, .visible-lg-inline-block, .visible-md-block, .visible-md-inline, .visible-md-inline-block, .visible-sm-block, .visible-sm-inline, .visible-sm-inline-block, .visible-xs-block, .visible-xs-inline, .visible-xs-inline-block {
    display: none !important
}
@media (min-width: 768px) and (max-width: 991px) {
    .visible-sm {
        display: block !important
    }
    .visible-sm-block {
        display: block !important
    }
    .visible-sm-inline {
        display: inline !important
    }
    .visible-sm-inline-block {
        display: inline-block !important
    }
    .hidden-sm {
        display: none !important
    }
}
@media (min-width: 992px) and (max-width: 1199px) {
    .visible-md {
        display: block !important
    }
    .visible-md-block {
        display: block !important
    }
    .visible-md-inline {
        display: inline !important
    }
    .visible-md-inline-block {
        display: inline-block !important
    }
    .hidden-md {
        display: none !important
    }
}

@media (min-width: 1200px) and (max-width: 1599px) {
    .visible-lg {
        display: block !important
    }
    .visible-lg-block {
        display: block !important
    }
    .visible-lg-inline {
        display: inline !important
    }
    .visible-lg-inline-block {
        display: inline-block !important
    }
    .hidden-lg {
        display: none !important
    }
}
@media (max-width: 1199px) {
	.catalog-filter-col-sort {
		text-align: left;
		padding-top: 15px;
	}
	.catalog-filter-sort-label {
		width: 100%;
		display: block;
	}
	.btn-filter {
		width: 210px;
		margin-top: 27px;
	}
}
@media (max-width: 991px) {
	.btn-filter {
		float: none;
		margin-left: auto;
		margin-right: auto;
		margin-top: 25px;
	}
}
@media (max-width: 767px) {
    .hidden-xs {
        display: none !important
    }
    .visible-xs {
        display: block !important
    }
    .visible-xs-block {
        display: block !important
    }
    .visible-xs-inline {
        display: inline !important
    }
    .visible-xs-inline-block {
        display: inline-block !important
    }
	.catalog-filter {
		margin-top: 30px;
	}
	.catalog-filter-col-check {
		padding-top: 33px;
		text-align: center;
	}
	.catalog-filter-check {
		display: inline-block;
		float: none;
		margin-right: 20px;
	}
	.catalog-filter-col-sort {
		text-align: center;
	}
	.catalog-filter-col-sort-box {
		text-align: left;
		display: inline-block;
	}
	.catalog-filter-sort {
		font-size: 12px;
		height: 30px;
		line-height: 26px;
		padding-left: 7px;
	}
}
@media (min-width: 1600px) {
    .hidden-xl {
        display: none !important
    }
    .visible-xl {
        display: block !important
    }
    .visible-xl-block {
        display: block !important
    }
    .visible-xl-inline {
        display: inline !important
    }
    .visible-xl-inline-block {
        display: inline-block !important
    }
}
</style>
{{ Form::open(['url' => '/boosters', 'id' => 'filter_form', 'class' => 'catalog-filter-box']) }}
	<div class="">
		<input type="hidden" value="Y" name="setFilter">
		<div class="mobile-filter-show-panel relative visible-xs">
			Фильтр поиска
			<div class="filter-show-panel-btn pointer"></div>
		</div>
		<div class="row catalog-filter hidden-xs">
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					Цена:
					<span class="filter-name-value">
						<span id="priceVal_1">0</span> - <span id="priceVal_2">312</span> руб.
					</span>
				</div>
				<div id="filterSliderPrice" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 0%;"></span>
					<span tabindex="0" class="ui-slider-handle ui-state-default ui-corner-all" style="left: 62.4%;"></span>
					<div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 62.4%;"></div>
				</div>
				<div class="labels labelName">
					<span class="labelValue" style="left:0%;">0</span>
					<span class="labelValue" style="left:50%;">250</span>
					<span class="labelValue" style="left:100%;">500</span>
				</div>
				<input type="hidden" name="price_from" value="0.00">
				<input type="hidden" name="price_to" value="312.00">
			</div>
			<div class="col-lg-3 col-md-6 col-12 catalog-filter-range-col">
				<div class="filter-name">
					Игроков:
					<span class="filter-name-value">
						<span id="gamersVal_1">без ограничений</span> <span id="gamersVal_2"></span>
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
					Возраст:
					<span class="filter-name-value">
						<span id="ageVal_1">любой</span> <span id="ageVal_2"></span>
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
					Время игры:
					<span class="filter-name-value">
						<span id="timeVal_1">без ограничений</span> <span id="timeVal_2"></span>
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
		<div class="catalog-filter catalog-filter-2  hidden-xs">
			<div class="row">
				<div class="col-lg-4 col-md-6 col-12 catalog-filter-col-check">
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox1" class="checkbox-custom" value="Y" name="SALELEADER">
						<label class="pointer" for="catalog-filter-checkbox1"><span class="checkbox-icon"></span>Хит</label>
					</div>
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox2" class="checkbox-custom" value="Y" name="NEWPRODUCT">
						<label class="pointer" for="catalog-filter-checkbox2"><span class="checkbox-icon"></span>Новинка</label>
					</div>
					<div class="catalog-filter-check">
						<input type="checkbox" id="catalog-filter-checkbox3" class="checkbox-custom" value="Y" name="SPECIALOFFER">
						<label class="pointer" for="catalog-filter-checkbox3"><span class="checkbox-icon"></span>Скидка</label>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-lg-6 col-md-6 col-12 catalog-filter-col-sort">
					<div class="catalog-filter-col-sort-box">
						<span class="catalog-filter-sort-label">Сортировать по:</span>
						<a class="catalog-filter-sort catalog-filter-sort-1" href="/catalog/MTG/?sort=price&amp;order=asc" rel="nofollow">цене</a>
						<a class="catalog-filter-sort" href="/catalog/MTG/?sort=name&amp;order=asc" rel="nofollow">алфавиту</a>
						<a class="catalog-filter-sort" href="/catalog/MTG/?sort=popular&amp;order=desc" rel="nofollow">популярности</a>
					</div>
				</div>
				<div class="col-lg-2 col-12">
					<button class="btn-filter">Показать</button>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
{{ Form::close() }}