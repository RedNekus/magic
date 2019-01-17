<h1>Ваш заказ</h1>
@include('basket._table')
<table>
	<tr>
		<td>Имя:</td>
		<td>{{ $name }}</td>
	</tr>
	<tr>
		<td>Телефон:</td>
		<td>{{ $phone }}</td>
	</tr>
	<tr>
		<td>Адрес:</td>
		<td>{{ $address }}</td>
	</tr>
	<tr>
		<td>Сообщение:</td>
		<td>@if($text) {!! $text !!} @endif</td>
	</tr>
</table>