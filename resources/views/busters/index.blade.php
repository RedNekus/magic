@extends('main')
@section('main')
    @parent
<main>
	<style>
		.old-price { text-decoration: line-through; }
		.buster > a.relative {
			margin-bottom: 20px!important;
		}
		.label {
			position: absolute;
			display: flex;
			align-items: center;
			justify-content: center;
			width: 50px;
			height: 50px;
			z-index: 2;
			font-weight: bold;
			color: white;
			font-size: 20px;
		}
		.sale {
			background: #ffae00;
			font-size: 28px;
			top: -15px;
			left: -15px;
			border-radius: 25px;
		}
		.new {
			font-size: 18px;
			top: -15px;
			right: -15px;
		}
		.new::after {
			content: "";
			width: 0; height: 0; 
			border-width: 40px 25px 15px;
			border-style: solid;
			border-color: #a9d81a #a9d81a transparent;
			position: absolute;
			top: 0;
			right: 0;
			z-index: -1;
		}
		.hit {
			background: #f84842;
			font-size: 18px;
			bottom: -15px;
			left: -5px;
		}
		.hit:before, .hit:after {
			content: "";
			height: 100%;
			width: 100%;
			background: inherit;
			position: absolute; top: 0; left: 0;
			z-index:-1;
		}
		.hit:before {
			transform: rotate(30deg);
		}
		.hit:after {
			transform: rotate(60deg);
		}
	</style>
	<div class="container py-3">
		<h1 class="col-12 col-lg p-0">{{ $content->title }}</h1>
		@include('busters._filter')
		<div class="catalog-body">
			@include('busters._catalog')
		</div>
		@if($content)
			{!! $content->body !!}
		@endif
	</div>
</main>
@endsection