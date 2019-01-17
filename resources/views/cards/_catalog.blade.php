<style>
	.old-price { 
		text-decoration: line-through;
		text-align: right;
	}
	.goods-item > a.relative {
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
<div class="tab-content">
	<div class="tab-pane fade show{{Session::get('view')=='block' || !Session::has('view')? '  active' : ''}}" id="block" role="tabpanel" aria-labelledby="block-tab">
		<div class="row">
			@foreach ($cards as $i=>$card)
				<div class="@if ($i%5 < 3) dropright @else dropleft @endif p-3 d-flex flex-column goods-item">
					<a href="cards/show/{{$card->id}}" id="card-{{ $card->id }}"  class="relative" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						@if($card->old_price) <div class="label sale">%</div> @endif
						@if($card->new) <div class="label new">NEW</div> @endif
						@if($card->popular) <div class="label hit">Хит</div> @endif
						<img src="{{Voyager::image($card->thumbnail('medium'))}}">
						<div class="hover">
							<button class="btn btn-primary px-3">Подробней</button>
						</div>
					</a>
					<p class="mt-2 mb-auto text-center"><a href="cards/show/{{$card->id}}">{{ $card->name }}</a></p>
					<p class="d-flex justify-content-between align-items-center">
						<span class="text-blue">{!! null !== $card->amount? 'в&nbsp;наличии&nbsp;'.$card->amount.'&nbsp;шт.' : 'нет в наличии'!!}</span>
						<span><span class="price">{{ $card->price }}</span>&nbsp;р</span> 
					</p>
					@if($card->old_price > 0) <p class="old-price">{{ $card->old_price }} р.</p>@endif
					<p class="relative{{$card->in_backet? ' hidden' : ''}}">
						<select name="brand_id"  class="count">
							@for($n = 1; $n <= $card->amount; $n++)
							<option value="{{$n}}">{{$n}}</option>
							@endfor
						</select>
					</p>
					<p><button data-id="{{$card->id}}" data-action="{{$card->in_backet? 'del' : 'add'}}" class="w-100 btn {{$card->in_backet? 'btn-light' : 'btn-primary'}}">{{$card->in_backet? 'Удалить' : 'Заказать'}}</button></p>
					<div class="dropdown-menu p-3" aria-labelledby="card-{{ $card->id }}">
						<h3><img src="{{ Voyager::image($card->thumbnail('md-icon', 'icon')) }}">{{ $card->sets_name }}</h3>
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
						{!! $card->decription !!}
					</div>
				</div>
			@endforeach
		</div>
	</div>
	<div class="my-3 tab-pane fade show{{ Session::get('view')=='list'? '  active' : '' }}" id="list" role="tabpanel" aria-labelledby="list-tab">
		<table class="cards-table w-100">
			<tr class="bg-light border border-gray rounded-4">
				<th></th>
				<th width="25%">Название</th>
				<th>Цвет</th>
				<th>Язык</th>
				<th>Редкость</th>
				<th>Foil</th>
				<th>Цена</th>
				<th>Кол</th>
				<th></th>
			</tr>
			@foreach ($cards as $i=>$card)
			<tr class="goods-item">
				<td><img src="{{Voyager::image($card->thumbnail('cropped'))}}" width="60"></td>
				<td><h3><a href="cards/show/{{$card->id}}">{{ $card->name }}</h3></a></td>
				<td><span class="{{ $card->color_code }}-icon">{{ $card->color_name }}</span></td>
				<td><span class="lng-{{ $card->lang_code }}">{{ $card->lang_name }}</span></td>
				<td><span class="{{ $card->rarity_code }}-icon">{{ $card->rarity_name }}</span></td>
				<td>{{{ !empty($card->foil) ? '' : 'Non-' }}}foil</td>
				<td>{{ $card->price }} р.</td>
				<td>{{ $card->amount }} шт.</td>
				<td><button data-id="{{$card->id}}" data-action="{{$card->in_backet? 'del' : 'add'}}" class="w-100 btn {{$card->in_backet? 'btn-light' : 'btn-primary'}}">{{$card->in_backet? 'Удалить' : 'Заказать'}}</button></td>
			</tr>
			@endforeach
		</table>
	</div>
</div>
@if($cnt > 1)
	<nav class="d-flex justify-content-center">
		<ul class="pagination">
			@for($i=1; $i <= $cnt; $i++)
				<li class="page-item{{$i==$pnum? ' active' : ''}}">
					<a class="page-link" href="{{ url('/cards/page', ['pnum'=>$i]) }}">{{$i}}</a>
				</li>
			@endfor
		</ul>
	</nav>
@endif