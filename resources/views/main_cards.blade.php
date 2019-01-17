<div class="carousel-item active">
	<div class="row">
		@foreach( $cards as $n=>$card )
		<div class="col goods-item py-4">
			<a href="cards/show/{{$card->id}}"><img src="{{Voyager::image($card->thumbnail('cropped'))}}"></a>
			<p class="mt-2 mb-auto text-center"><a href="cards/show/{{$card->id}}">{{ $card->name }}</a></p>
			<p class="d-flex justify-content-between align-items-center"><span class="text-blue">в наличии {{$card->amount}} шт.</span><span><span class="price">{{ $card->price }}</span> р</span></p>
			<p class="relative{{$card->in_backet? ' hidden' : ''}}">
				<select name="brand_id"  class="count">
				@for($i = 1; $i <= $card->amount; $i++)
					<option value="{{$i}}">{{$i}}</option>
				@endfor
				</select>
			</p>
			<p><button data-id="{{$card->id}}" data-action="{{$card->in_backet? 'del' : 'add'}}" class="w-100 btn {{$card->in_backet? 'btn-light' : 'btn-primary'}}">{{$card->in_backet? 'Удалить' : 'Заказать'}}</button></p>
		</div>
		@if($n%5 == 4)
	</div>
</div>
<div class="carousel-item">
	<div class="row">
		@endif
		@endforeach
	</div>
</div>