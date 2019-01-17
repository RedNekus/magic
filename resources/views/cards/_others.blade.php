@foreach ($others as $i=>$other)
	<div class="col-lg-2 col-md-4 col-6 p-3 d-flex flex-column goods-item">
		<a href="cards/show/{{$other->id}}"><img src="{{Voyager::image($other->thumbnail('cropped'))}}"></a>
		<p class="mt-2 mb-auto text-center">{{ $other->name }}</p>
		<p class="d-flex justify-content-between align-items-center"><span class="text-blue">{{{$other->in_stock? 'в наличии '.$other->amount.' шт.' : 'нет в наличии'}}}</span><span><span class="price">{{ $other->price }}</span> р</span></p>
		<p class="relative{{$other->in_backet? ' hidden' : ''}}">
			<select name="brand_id"  class="count">
				@for($i = 1; $i <= $other->amount; $i++)
				<option value="{{$i}}">{{$i}}</option>
				@endfor
			</select>
		</p>
		<p><button data-id="{{$other->id}}" data-action="{{$other->in_backet? 'del' : 'add'}}" class="w-100 btn {{$other->in_backet? 'btn-light' : 'btn-primary'}}">{{$other->in_backet? 'Удалить' : 'Заказать'}}</button></p>
	</div>
@endforeach