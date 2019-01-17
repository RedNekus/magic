<ul class="nav d-flex">
	@foreach($items as $menu_item)
		<li class="nav-item"><a href="{{ $menu_item->link() }}" class="nav-link">{{ $menu_item->title }}</a></li>
	@endforeach
</ul>