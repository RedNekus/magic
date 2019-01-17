<div class="row">
	@foreach ($busters as $i=>$buster)
		<div class="p-3 d-flex flex-column goods-item buster">
			<a href="{{ url('/'.$sname.'/show', ['id'=>$buster->id]) }}" id="buster-{{ $buster->id }}"  class="relative">
			@if($buster->newprice) <div class="label sale">%</div> @endif
			@if($buster->new) <div class="label new">NEW</div> @endif
			@if($buster->hit) <div class="label hit">Хит</div> @endif
			@if($sname=='accessory')
				<img src="{{Voyager::image($buster->thumbnail('medium', 'image'))}}">
			@else
				<img src="{{Voyager::image($buster->thumbnail('medium', 'photo'))}}">
			@endif
			</a>
			<p class="mt-2 mb-auto text-center"><a href="{{ url('/'.$sname.'/show', ['id'=>$buster->id]) }}">{{ $buster->name }}</a></p>
			<p class="d-flex justify-content-between align-items-center">
				<span class="text-blue">{!! null !== $buster->amount? 'в&nbsp;наличии&nbsp;'.$buster->amount.'&nbsp;шт.' : 'нет в наличии'!!}</span>
				<span><span class="price">@if($buster->newprice > 0) {{ $buster->newprice }} @else {{ $buster->price }} @endif</span>&nbsp;р</span> 
				@if($buster->newprice > 0) <span class="old-price">{{ $buster->price }} р.</span>@endif
			</p>
			<p class="relative{{$buster->in_backet? ' hidden' : ''}}">
				<select name="brand_id"  class="count">
				@if(isset($buster->amount))
					@for($n = 1; $n <= $buster->amount; $n++)
					<option value="{{$n}}">{{$n}}</option>
					@endfor
				@endif
				</select>
			</p>
			<p><button data-type="{{ ($sname=='accessory'? 'accessories' : 'busters') }}" data-id="{{$buster->id}}" data-action="{{$buster->in_backet? 'del' : 'add'}}" class="w-100 btn {{$buster->in_backet? 'btn-light' : 'btn-primary'}}">{{$buster->in_backet? 'Удалить' : 'Заказать'}}</button></p>
		</div>
	@endforeach
</div>

@if($cnt > 1)
	<nav class="d-flex justify-content-center">
		<ul class="pagination">
			@for($i=1; $i <= $cnt; $i++)
				<li class="page-item{{$i==$pnum? ' active' : ''}}">
					<a class="page-link" href="{{ url('/'.$sname.'/page', ['pnum'=>$i]) }}">{{$i}}</a>
				</li>
			@endfor
		</ul>
	</nav>
@endif