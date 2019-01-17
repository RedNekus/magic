@extends('main')
@section('main')
    @parent
		<main class="homepage">
			<div class="container py-3">
				<div id="carousel-slider" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						@for($i=0; $i < count($slider); $i++)
						<li data-target="#carousel-slider" data-slide-to="{{$i}}"{!! $i==0? ' class="active"' : '' !!}></li>
						@endfor
					</ol>
					<div class="carousel-inner">
						@if($slider)
						@foreach($slider as $k=>$item)
						<div class="carousel-item{{$k==0? ' active' : ''}}">
							<img class="d-block w-100" src="{{Voyager::image($item->image)}}" alt="{{ $item->alt }}">
						</div>
						@endforeach
						@endif
					</div>
				</div>
				<div class="d-flex justify-content-center mt-4 buttons" id="where_buttons">
					<a href="#" data-where="new" class="mx-3 btn btn-primary">Новинки</a>
					<a href="#" data-where="popular" class="mx-3 btn btn-outline-primary">Популярное</a>
					<a href="#" data-where="old_price" class="mx-3 btn btn-outline-primary">На скидки</a>
				</div>
				<div id="carousel-goods"  class="carousel slide" data-ride="carousel">
					<div class="carousel-inner">
						@include('main_cards')
					</div>
					<a class="carousel-control-prev" href="#carousel-goods" role="button" data-slide="prev">
						<img src="img/blue-arrow-left.png">
					</a>
					<a class="carousel-control-next" href="#carousel-goods" role="button" data-slide="next">
						<img src="img/blue-arrow-right.png">
					</a>
				</div>
				<div class="d-flex justify-content-center buttons">
					<a href="{{ route('cards.index', ['sec' => 'cards']) }}" class="mx-3 btn btn-outline-primary">Перейти в каталог карт</a>
				</div>
				<div class="row bannres py-3">
					@foreach($banners as $banner)
					<div class="py-3 col-lg-6">
						<a href="{{$banner->link}}"><img src="{{ Voyager::image($banner->image) }}" alt="{{ $banner->alt }}"></a>
					</div>
					@endforeach
				</div>
				<h1 class="border-bottom pb-1 border-gray">{{ $page->title }}</h1>
				{!! $page->body !!}
			</div>
		</main>
@endsection