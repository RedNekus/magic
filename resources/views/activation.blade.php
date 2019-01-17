@extends('main')

@section('content')
<div class="container pt-5" style="padding-top: 5rem !important;">
    <h1>Рассылка</h1>
    <div class="page-content__wrap">
      {!! $message !!}
    </div>
</div>
@endsection