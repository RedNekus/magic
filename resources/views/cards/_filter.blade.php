{{ Form::open(['url' => '/cards', 'id' => 'filter_form']) }}
	<div class="d-flex flex-column flex-lg-row justify-content-between">
		<div class="d-flex justify-content-between flex-column p-3">
			<div>
				<h2>Cеты</h2>
				<div class="select-wrapper">
					{!! Form::customSelect('sets', $select, null, ['class' => 'd-none', 'multiple' => false, 'id'=>'sets']) !!}
					@include('_list', ['list' => $select])
				</div>
			</div>
			<div>
				<a href="javascript:void(0);" class="h2 cross mt-3 mt-lg-0" id="clear">Очистить фильтр</a>
			</div>
		</div>
		<div class="d-flex flex-wrap px-3 pb-3 p-lg-3 flex-column flex-lg-row">
			<h2 class="w-100">Цвет:</h2>
			<div class="pr-lg-3">
			@foreach ($colors as $i => $color)
				<div class="form-check @if($i % 4 == 0) mt-0 @endif">
					{{ Form::checkbox('color[]', $color->color_id, false, ['class' => 'form-check-input', 'id' => 'color_'.$i]) }}
					{!! Form::rawLabel("color_".$i, "<span class='mr-auto'>".$color->color_name."</span>", ['class' => 'form-check-label '.$color->color_code.'-icon']) !!}
				</div>
			@if ($i % 4 == 3)
			</div>
			<div>
			@endif
			@endforeach
			</div>
		</div>
		<div class="p-3">
			<h2>Редкость:</h2>
			@foreach ($rarity as $i => $r)
			<div  class="form-check">
				{{ Form::checkbox('rarity[]', $r->rarity_id, false, ['class' => 'form-check-input', 'id' => 'rarity_'.$i]) }}
				{!! Form::rawLabel("rarity_".$i, "<span class='mr-auto'>".$r->rarity_name."</span>", ['class' => 'form-check-label '.$r->rarity_code.'-icon']) !!}
			</div>
			@endforeach
		</div>
		<div class="p-3">
			<h2>Язык:</h2>
			@foreach ($lang as $i => $lng)
			<div  class="form-check">
				{{ Form::checkbox('lang[]', $lng->lang_id, false, ['class' => 'form-check-input', 'id' => 'lang_'.$i]) }}
				{!! Form::rawLabel("lang_".$i, "<span class='mr-auto'>".$lng->lang_name."</span>", ['class' => 'form-check-label lng-'.$lng->lang_code]) !!}
			</div>
			@endforeach
		</div>
		<div class="p-3">
			<h2>Foil:</h2>
			<div  class="form-check">
				{{ Form::checkbox('foil[]', 1, false, ['class' => 'form-check-input', 'id' => 'foil_1']) }}
				{{ Form::label("foil_1", "Foil", ['class' => 'form-check-label']) }}
			</div>
			<div  class="form-check">
				{{ Form::checkbox('foil[]', 0, false, ['class' => 'form-check-input', 'id' => 'foil_0']) }}
				{{ Form::label("foil_0", "Non-Foil", ['class' => 'form-check-label']) }}
			</div>
		</div>
	</div>
{{ Form::close() }}