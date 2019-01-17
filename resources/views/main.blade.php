<?php use \App\Basket; ?>
<!DOCTYPE html>
<html lang="RU">
	<head>
		<title>{{setting('site.title')}}</title>
		<base href="http://magic.mpl.by/">

		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
		<script src="js/jquery-3.3.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery-ui.min.js"></script>
		<script src="js/script.js"></script>
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width'>
		<meta name="_token" content="{{ csrf_token() }}">
		<style>
			body {
				display: flex;
				flex-direction: column;
			}
			header {
				background: linear-gradient(rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.7)), url("{{Voyager::image(setting('site.bg_mage'))}}");
				background-repeat: no-repeat;
				background-position: left 45px;
				background-size: 100%;
				flex-shrink: 0;
			}
			footer {
				flex-shrink: 0;
			}
			main {
				background: linear-gradient(to bottom, transparent 250px, white 500px), url("{{Voyager::image(setting('site.bg_mage'))}}") no-repeat left -85px;
				background-size: 100%;
			}
			main.homepage {
				background: linear-gradient(to bottom, rgba(255,255,255,0.4), white 120px), url("{{Voyager::image(setting('site.bg_mage'))}}") no-repeat left -85px;
				background-size: 100%;
			}
			.dropdown-select {
				z-index: 3;
			}
			.goods-item.buster > a {
			    height: 276px;
				display: flex;
				align-items: center;
				justify-content: center;
				border: 1px solid #e5e5e5;
				box-sizing: content-box;
			}
			.goods-item.buster > a:hover {
				border-color: #0271ab;
			}
			@media (max-width: 639px) {
				.goods-item {
					width: 50%;
				}
			}
			@media (min-width: 640px) and (max-width: 767px) {
				.goods-item {
					width: 33.33%;
				}
			}
			@media (max-width: 767px) {
				.ui-slider.ui-slider-horizontal {
					font-size: 1.2rem!important;
				}
				header {
					height: 210px;
				}
				header ul.nav {
					margin-left: 0;
					margin-top: 65px;
					width: 100%;
					justify-content: space-between;
				}
				.navbar {
					height: 50px;
					display: block;
				}
				.navbar-brand { 
					position: relative;
				}
				.form-inline.search {
					position: absolute;
					top: -45px;
				}
				.custom-select {
					width: 100%;
				}
				.nav-tabs { 
					display: none;
				}
				#sort, .sortby {
					width: 100%;
				}
				.subscribe .input-group {
					align-items: flex-end;
					flex-direction: column;
				}
				.subscribe .form-control {
					width: 100%;
					min-width: 215px;
				}
				.subscribe .btn-primary {
					margin-right: 1rem;
					margin-top: 0.5rem;
				}
				.subscribe-icon {
					align-self: flex-start;
				}
				#filter_form {
					font-size: 1.5rem;
				}
				.form-check {
					margin-bottom: 0.85rem;
				}
				.form-check:hover::after {
					width: 2.3rem;
					height: 2.3rem;
				}
				.form-check .form-check-label::after {
					width: 19px;
					height: 19px;
					margin-right: 0.11rem;
				}
				.form-inline.search {
					top: 120px;
					width: calc(100% - 2rem);
					left: 1rem;
				}
				.search .input-group {
					width: 100%;
				}
				.custom-select {
					height: calc(2.85rem + 2px);
				}
				.dropdown {
					z-index: 3;
				}
				.dropdown-menu {
					margin-right: calc(1rem + 1px);
					margin-top: 45px;
				}
				header ul.nav {
					margin-left: 0;
					margin-top: 20px;
					width: 100%;
					justify-content: space-between;
				}
				.navbar-toggler {
					position: absolute;
					top: 0.5rem;
					right: 1rem;
					z-index: 5;
				}
				#navbar {
					position: absolute;
					top: 0px;
					padding-top: 45px;
					background: #f0f0f0 !important;
					z-index: 4;
					width: 100%;
				}
				#navbar .nav-item {
					text-transform: uppercase;
					border-bottom: 1px solid rgba(0, 0, 0, 0.1);
					width: 100%;
					text-align: center;
					padding: 0.35rem 1rem;
				}
				#carousel-goods .col {
					min-width: 50%;
					flex-basis: 50%;
					padding-right: calc(25% - 80px);
					padding-left: calc(25% - 80px);
				}
			}
			@media (max-width: 991px) {
				/* header > .container {
					flex-wrap: wrap;
				}
				header ul.nav {
					margin-left: 0;
					margin-top: 20px;
					width: 100%;
					justify-content: space-between;
					flex-shrink: 0;
				}
				.form-inline.search {
					top: 120px;
					width: calc(100% - 2rem);
					left: 1rem;
					flex-shrink: 0;
				}
				.search .input-group {
					width: 100%;
				}
				.navbar {
					height: 50px;
					display: block;
				}
			} */
		</style>
	</head>
	<body>
		<header class="d-flex flex-column">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				<div class="container">
					<a class="navbar-brand" href="/"><img src="{{Voyager::image(setting('site.logo'))}}"></a>
					<a class="mail d-none d-lg-flex align-items-center" href="mailto:mtg.sales@kts.by">mtg.sales@kts.by</a>
					{{ menu('main_menu', 'menu') }}
					<div class="dropdown">
						<a href="#" class="btn btn-primary basket" id="basket" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $asum > 0? Basket::addText($asum) : 'Нет товаров' }}</a>
						<div class="dropdown-menu dropdown-menu-right p-3 basket-body" aria-labelledby="basket">
							<table class="cards-table w-100">
								@foreach($basket as $item)
								<tr>
									<td><img src="{{Voyager::image($item->thumbnail('cropped', 'image'))}}" width="50"></td>
									<td>{{$item->name}}</td>
									<td>{{$item->price}} р.</td>
									<td>{{$item->amount}} шт.</td>
									<td><a href="/basket/del/{{$item->id}}" data-type="{{$item->type}}" data-action="del" data-id="{{$item->id}}"><img src="img/del.jpg"></a></td>
								</tr>
								@endforeach
							</table>
							<p class="mt-3 mb-0 text-right">
							@if( $asum > 0 )
							<a href="/basket" class="btn btn-blue">Оформить</a>
							@else
							Корзина пуста
							@endif
							<p>
						</div>
					</div>
				</div>
			</nav>
			<div class="container flex-fill d-flex justify-content-end justify-content-lg-between align-items-center">
				{{ menu('cat-menu', 'catmenu') }}
				<form class="form-inline search" action="/search" method="get">
					<div class="input-group">
						<input type="text" name="search_text" id="search_text" class="form-control" placeholder="Введите название игры">
						<div class="input-group-append">
							<button class="btn btn-outline-gray bg-white" type="submit" id="inputGroupFileAddon04"><img src="img/search.png"></button>
						</div>
					</div>
				</form>
			</div>
		</header>
		@section('main')
        @show
		@section('content')
        @show
		<footer class="border-top border-gray">
			<div class="container my-3">
				<div class="row justify-content-between align-items-center">
					<div class="subscribe-icon px-3">Подписывайтесь<br> на новости и акции</div>
					<div class="px-3">
						{{ Form::open(['url' => '/subscribe', 'id' => 'subscribe', 'class' =>'form-inline subscribe']) }}
							<div class="input-group">
								{{ Form::text('email', '', ['class'=>'form-control', 'placeholder'=>'Ваш email']) }}
								{{ Form::submit('Подписаться', ['class'=>'btn btn-primary']) }}
							</div>
						{{ Form::close() }}
					</div>
					<a class="mail d-none d-lg-flex align-items-center flex-fill" href="mailto:mtg.sales@kts.by">mtg.sales@kts.by</a>
					<div class="px-3 d-none d-lg-flex align-items-center">
						<img src="img/ks-logo.png">
						<small class="ml-3">продвижение и <br>разработака сайтов</small>
					</div>
				</div>
				<div class="row mt-3">
					<div class="px-3">
						<p><small>© 2010-2012 "KS"</small></p>
						<div class="pr-3 d-flex d-lg-none align-items-center">
							<img src="img/ks-logo.png">
							<small class="ml-3">продвижение и <br>разработака сайтов</small>
						</div>
					</div>
					<div class="px-3">
						<p><strong class="text-primary">Компания</strong></p>
						<ul>
							<li><a href="{{ url('/about') }}">О компании</a></li>
							<li><a href="{{ url('/news') }}">Новости</a></li>
						</ul>
					</div>
					<div class="px-3">
						<p><strong class="text-primary">Информация</strong></p>
						<ul>
							<li><a href="{{ url('/pay') }}">Оплата</a></li>
							<li><a href="{{ url('/delivery') }}">Доставка</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>