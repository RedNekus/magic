<div class='relative'>
	<div class='custom-select'>
		<div class='text'>{{ Session::get('sets')? MagicCards::currentSet($list) : "Выберите сет…" }}</div>
	</div>
	<div class='dropdown-select'>
		<ul>
		<li>Выберите сет…</li>
		@foreach($list as $item)
			<li value="{{ $item->sets_id }}"><span class="set"><img src="{{  Voyager::image($item->thumbnail('sm-icon', 'icon')) }}"></span> {{ $item->sets_name }}</li>
		@endforeach
		</ul>
	</div>
</div>