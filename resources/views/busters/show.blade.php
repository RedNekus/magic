@extends('main')
@section('main')
    @parent
<main class="flex-fill">
	@if(!empty($buster))
	<div class="container">
		<div class="bg-white p-3 mb-3">
			<style>
				table.buster-table {
					border-top: 1px solid #e5e5e5;
				}
				table.buster-table th {
					padding: 1rem;
				}
				table.buster-table td {
					padding: 1rem;
				}
				table.buster-table tr {
					border-bottom: 1px solid #e5e5e5;
				}
				table.buster-table {
					margin-bottom: 1rem;
				}
				.modal-dialog {
					display: flex;
					align-items: center;
					justify-content: center;
				}
				.modal-content {
					width: auto;
				}
				.modal-content img {
					max-width: 75vw;
				}
				.row.single > div:first-of-type {
					max-width: 310px;
				}
				.row.single > div:first-of-type > p:last-of-type {
					margin-left: auto;
					margin-right: auto;
					max-width: 250px;
				}
			</style>
			<div class="row single">
				<div class="mr-5">
					<h1>{{ $buster->name }}</h1>
					<a href="{{Voyager::image($buster->photo)}}" data-toggle="modal" data-target="#imgModal">
					@if($sname=='accessory')
						<img src="{{Voyager::image($buster->thumbnail('original', 'image'))}}" />
					@else
						<img src="{{Voyager::image($buster->thumbnail('original', 'photo'))}}" />
					@endif
					</a>
					<!-- Modal -->
					<div class="modal fade" id="imgModal" tabindex="-1" role="dialog" aria-labelledby="imgModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
								@if($sname=='accessory')
									<img src="{{Voyager::image($buster->image)}}" />
								@else
									<img src="{{Voyager::image($buster->photo)}}" />
								@endif
								</div>
							</div>
						</div>
					</div>
					<!--  -->
					<p class="price text-right px-3">{{$buster->price}} руб.</p>
					<p class="px-3"><button data-type="busters" data-id="{{$buster->id}}" data-action="{{$buster->in_backet? 'del' : 'add'}}" class="btn {{$buster->in_backet? 'btn-light' : 'btn-primary'}} w-100">{{$buster->in_backet? 'Удалить' : 'Заказать'}}</button></p>
				</div>
				<div class="col px-3" aria-labelledby="card-1">
					@if($buster->gamers || $buster->age || $buster->time)
					<table class="buster-table w-100">
						<tr>
							<th>Игроков</th>
							<th>Возраст</th>
							<th>Время игры</th>
						</tr>
						<tr>
							<td>от {{$buster->gamers}}</td>
							<td>от {{$buster->age}} лет</td>
							<td>от {{$buster->time}} мин.</td>
						</tr>
						<tr>
							<td colspan="3">
								<p><strong>Язык:</strong> {{$buster->lang_name}}</p>
								<p><strong>Страна:</strong> {{$buster->country_name}}</p>
								<p><strong>Издатель:</strong> {{$buster->producer_name}}</p>
								<p><strong>Категория:</strong> {{$buster->category_name}}</p>
							</td>
						</tr>
					</table>
					@endif
					<p class="h1">Описание</h1>
					{!! $buster->description !!}
					@if($buster->equipment)
					<p class="h1">Комплектация</h1>
					@endif
					{!! $buster->equipment !!}
				</div>
			</div>
		</div>
	</div>
	@endif
</main>
@endsection