@extends('main')
@section('main')
    @parent
<style>
	.nav-tabs { border: none; }
	.nav-tabs a:not(.active) { opacity: 0.6; }
	.nav-tabs a:hover {opacity: 1;}
</style>
<main class="flex-fill">
	<div class="container py-3">
		<div class="border border-gray mb-3 bg-opacity">
		@include('cards._filter')
		</div>
		<div class="d-flex flex-wrap justify-content-between align-items-center">
			<h1 class="col-12 col-lg p-0">Сингл карты MTG</h1>
			<div class="d-flex align-items-center justify-content-between col-12 col-lg p-0">
				{{ Form::open(['url' => '/cards', 'method'=>'GET', 'id'=>'sort', 'class'=>'ml-auto']) }}
				{!! Form::select('sortby', $sortby, null, ['class' => 'form-control sortby', 'multiple' => false, 'id'=>'sortby']) !!}
				{{ Form::close() }}
				<div class="nav nav-tabs" role="tablist">
					<a id="block-tab" class="mx-3 rounded-circle bg-white p-2{{Session::get('view')=='block' || !Session::has('view')? ' active show' : ''}}" data-toggle="tab" href="#block" role="tab" aria-controls="block" aria-selected="{{Session::get('view')=='block' || !Session::has('view')? 'true' : 'false'}}"><img src="img/block-icon.png" /></a>
					<a id="list-tab" class="rounded-circle bg-white p-2{{Session::get('view')=='list'? ' active show' : ''}}" data-toggle="tab" href="#list" role="tab" aria-controls="list" aria-selected="{{Session::get('view')=='list'? 'true' : 'false'}}"><img src="img/list-icon.png" /></a>
				</div>
			</div>
		</div>
		<div class="catalog-body">
			@include('cards._catalog')
		</div>
		@if($content)
		<h1>{{ $content->title }}</h1>
			{!! $content->body !!}
		@endif
	</div>
</main>
@endsection