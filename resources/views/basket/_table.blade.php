@if(count($goods))
<table class="mt-2 cards-table full w-100">
	@foreach($goods as $item)
	<tr>
		<td><img src="{{Voyager::image($item->thumbnail('cropped'))}}" width="80"></td>
		<td>{{ $item->name }}</td>
		<td>{{ $item->price }} р.</td>
		<td>{{ $item->amount }} шт.</td>
		<td><a href="/basket/del/{{$item->id}}" data-type="{{$item->type}}" data-action="del" data-id="{{$item->id}}"><img src="img/del.jpg"></a></td>
	</tr>
	@endforeach
	<tr>
		<td colspan="3"></td>
		<td><strong>Итого</td>
		<td><strong id="total">{{$sum}} р.</strong></td>
	</tr>
</table>
@else
<p>Корзина пуста</p>
@endif