@extends('main')
@section('main')
    @parent
<main class="homepage">
	<div class="container py-3">
			<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
					<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>
				<div class="carousel-inner">
					@if($slider)
					@foreach($slider as $k=>$item)
					<div class="carousel-item{{$k==0? ' active' : ''}}">
						<img class="d-block w-100" src="{{Voyager::image($item->image)}}" alt="{{ $item->alt }}">
					</div>
					@endforeach
					@endif
				</div>
			</div>
			<div class="row mt-3">
				<div class="col-lg-7 mt-3 pt-1">
					@include('basket._table')
				</div>
				<div class="col-lg-5">
					{{ Form::open(array('url' => '/backet/send', 'id' => 'backetform')) }}
						<div id="senderror">
							При отправке сообщения произошла ошибка. Продублируйте его, пожалуйста, на почту администратора <span>{{ env('MAIL_ADMIN_EMAIL') }}</span>
						</div>
						<div class="form-group">
							{!! Form::rawLabel("name", "Ваше имя<span>*</span>", ['for' => 'name']) !!}
							{{ Form::text('name', "", ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) }}
						</div>
						<div class="form-group">
							{!! Form::rawLabel("phone", "Телефон <span>*</span>", ['for' => 'phone']) !!}
							{{ Form::text('phone', "", ['class' => 'form-control', 'id' => 'phone', 'required' => 'required']) }}
						</div>
						<div class="form-group">
							{!! Form::rawLabel("address", "Адрес <span>*</span>", ['for' => 'address']) !!}
							{{ Form::text('address', "", ['class' => 'form-control', 'id' => 'address', 'required' => 'required']) }}
						</div>
						<div class="form-group">
							{!! Form::label("text", "Комментарий", ['for' => 'text']) !!}
							{{ Form::textarea('text', "", ['class' => 'form-control', 'id' => 'text', 'rows' => 6]) }}
						</div>
						<div class="form-group">
							<button class="btn btn-primary" type="submit">Оформить</button>
						</div>
					{{ Form::close() }}
				</div>
			</div>
			<div id="success" class="d-none">
				<p>Ваше сообщение отправлено. Наш сотрудник свяжется с вами в ближайщее время.</p>
			</div>
		</div>
	</div>
</main>
@endsection