@extends('main')

@section('content')
<main class="flex-fill">
	<div class="container pt-5" style="padding-top: 5rem !important;">
		<h1>
		  {{ $page->title }}
		</h1>
		<div class="page-content__wrap">
		  {!! $page->body !!}
		</div>
	</div>
</main>
@endsection