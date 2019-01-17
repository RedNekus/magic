<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>
<ul class="navbar-nav ml-auto collapse navbar-collapse mr-3" id="navbar">
	@foreach($items as $menu_item)
		<li class="nav-item"><a href="{{ $menu_item->link() }}" class="nav-link">{{ $menu_item->title }}</a></li>
	@endforeach
</ul>