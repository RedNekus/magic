@extends('main')
@section('main')
    @parent
<style>
	.search-table td {
		padding: 0.5rem;
		border: 1px solid #dee2e6 !important;
	}
</style>
<main>
	<div class="container py-3">
		<div class="d-flex justify-content-between align-items-center">
			<h1>Поиск карт</h1>
		</div>
		<div class="catalog-body mb-3">
			<p>По запросу "<strong>{{ Request::input('search_text') }}</strong>" найдено {{$total}} результатов</p>
			<table class="search-table">
				@foreach($search as $card)
				<tr>
					<td><img width="80" src="{{Voyager::image($card->thumbnail('cropped'))}}"></td>
					<td>
						<h3><a href="cards/show/{{$card->id}}">{{ $card->name }}</a></h3>
						{!! $card->decription !!}
					</td>
					<td><img src="{{ Voyager::image($card->thumbnail('md-icon', 'icon')) }}"></td>
				</tr>
				@endforeach
			</table>
		</div>
		@if(ceil($total/5) > 1)
			<nav class="d-flex justify-content-center">
				<ul class="pagination">
					@for($i=1; $i <= ceil($total/5); $i++)
						<li class="page-item{{$i==$pnum? ' active' : ''}}">
							<a class="page-link" href="{{ url('/search/page', ['pnum'=>$i]) }}?search_text={{ Request::input('search_text') }}">{{$i}}</a>
						</li>
					@endfor
				</ul>
			</nav>
		@endif
	</div>
</main>
@endsection