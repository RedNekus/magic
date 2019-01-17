@extends('main')
@section('main')
    @parent
<style>
	.single-header {
		margin-left: -15px;
		margin-right: -15px;
	}
</style>
<main class="flex-fill">
	<div class="container">
		<div class="bg-white p-3 mb-3">
			<style>
				.row.single > div:first-of-type {
					max-width: 310px;
				}
				.row.single > div:first-of-type > p:last-of-type {
					margin-left: auto;
					margin-right: auto;
					max-width: 250px;
				}
			</style>
			<h1 class="single-header">{{ $card->name }}</h1>
			<div class="row single">
				<div class="mr-5 py-3">
					<img src="{{Voyager::image($card->image)}}" style="max-height: 600px;">
					<p class="price text-right mt-3 px-3">{{$card->price}} руб.</p>
					<p class="px-3"><button data-type="magic_cards" data-id="{{$card->id}}" data-action="{{$card->in_backet? 'del' : 'add'}}" class="btn {{$card->in_backet? 'btn-light' : 'btn-primary'}} w-100">{{$card->in_backet? 'Удалить' : 'Заказать'}}</button></p>
				</div>
				<div class="col p-3" aria-labelledby="card-1">
					<h3><img src="{{ Voyager::image($card->thumbnail('mx-icon', 'icon')) }}" class="mr-2">{{ $card->sets_name }}</h3>
					<table class="card-table w-100">
						<tr>
							<td>Цвет:</td>
							<td><span class="{{ $card->color_code }}-icon">{{ $card->color_name }}</span></td>
						</tr>
						<tr>
							<td>Редкость:</td>
							<td><span class="{{ $card->rarity_code }}-icon">{{ $card->rarity_name }}</span></td>
						</tr>
						<tr>
							<td>Язык:</td>
							<td><span class="lng-{{ $card->lang_code }}">{{ $card->lang_name }}</span></td>
						</tr>
						<tr>
							<td colspan="2"><strong>{{{ !empty($card->foil) ? '' : 'Non-' }}}Foil</strong></td>
						</tr>
						<tr>
							<td>Состояние:</td>
							<td><strong>{{ $card->condition_name }}</strong></td>
						</tr>
					</table>
					<p class="h3">{{ $card->type }}</p>
					<p>{!! $card->decription !!}</p>
				</div>
			</div>
		</div>
		@if(count($others))
			<h1>Другие карты сета</h1>
			<div class="row others">
			@include('cards._others')
			</div>
		@endif
		@if($cnt > 1)
			<nav class="d-flex justify-content-center">
				<ul class="pagination">
					@for($i=1; $i <= $cnt; $i++)
						<li class="page-item{{$i==$pnum? ' active' : ''}}">
							<a class="page-link other-page" data-sets="{{ $card->sets }}" data-id="{{$card->id}}" data-page="{{$i}}" href="{{ url('/cards/page/show', ['id'=>$card->id, 'setpage'=>$i]) }}">{{$i}}</a>
						</li>
					@endfor
				</ul>
			</nav>
		@endif
	</div>
</main>
@endsection