var addText = function (asum) {
	end = asum % 10;
	if( 1 < end && end < 5)
		var suffix = "a";
	else if(end > 4 || end == 0)
		var suffix = "ов";
	else 
		var suffix = "";
	return asum + " товар" + suffix;
}
var checkSlider = function() {
	var amount = $('#carousel-goods .goods-item').length;
	if( amount > 10 && document.body.clientWidth > 767 ) {
		$('#carousel-goods .carousel-control-prev, #carousel-goods .carousel-control-next').css({'display' : 'flex'});
	} else {
		$('#carousel-goods .carousel-control-prev, #carousel-goods .carousel-control-next').css({'display' : 'none'});
	}
	if(document.body.clientWidth < 768) {
		$('#carousel-goods').carousel({ interval: false });
		$('#carousel-goods .carousel-item:not(.active) .goods-item').each(function(){
			console.log('append');
			$('#carousel-goods .carousel-item.active .row').append(this);
		});
	}
};
$(document).ready(function() {
	$(document).on('show.bs.dropdown', '.goods-item', function (e){
		if(document.body.clientWidth < 768) {
			e.preventDefault();
			location.href=$(this).find('a[data-toggle="dropdown"]').attr('href');
			return 0;
		}
	});
	//Подписка
	$('.subscribe').submit(function(e){
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '/subscribe',
			data: $(this).serialize(),
			success: function(result){
				if(result) {
					var message_success = document.getElementById("subscribe_message");
					if(!message_success) {
						message_success = document.createElement("DIV");
						$(message_success).addClass('message');
						$(message_success).attr('id', 'subscribe_message');
						$(message_success).html("Подписка отправлена");
					} else 
						$(message_success).show();
					
					$('header > .container').append(message_success);
					$(document).scrollTop(0);
					setTimeout(function() { $(message_success).hide(); }, 3000);
				}
			}
		});
	});
	
	checkSlider();
	$('.nav[role="tablist"] a').click(function(){
		$.ajax({
			type: 'POST',
			url: '/cards/view',
			context: this,
			data: {'view': $(this).attr('aria-controls'), '_token': $('input[name="_token"]').val()},
			success: function(result) {
				
			}
		});
	});
	$('.custom-select').click(function() {
		$(this).next('.dropdown-select').slideToggle();
	});
	$('.dropdown-select li').click(function() {
		$(this).parents('.select-wrapper').find('.text').html($(this).text());
		if( $(this).find('img').length )
			$(this).parents('.select-wrapper').find('.custom-select').css({'background-image': 'url("' + $(this).find('img').attr('src') + '")', 'background-size': 'auto'});
		else
			$(this).parents('.select-wrapper').find('.custom-select').removeAttr('style');
		$('.dropdown-select').slideUp();

		var option = $(this).parents('.select-wrapper').find('option[value="' + $(this).val() + '"]');
		if(option) {
			$(this).parents('.select-wrapper').find('option:selected').removeAttr('selected');
			option.attr('selected', 'selected');
			option.change();
		}
	});
	$('#sort').change(function(e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '/cards/filter',
			data: $(this).serialize() + '&' + $("#filter_form").serialize(),
			success: function(result){
				$('.catalog-body').html(result);
				history.pushState(null, null, '/cards');
			}
		});
	});
	$("#filter_form").change(function(e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: '/cards/filter',
			data: $(this).serialize()  + '&' + $("#sort").serialize(),
			success: function(result){
				$('.catalog-body').html(result);
				history.pushState(null, null, '/cards');
			}
		});
	});
	
	$("#filter_busters").submit(function(e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: $(this).attr('action'),
			data: $(this).serialize(),
			success: function(result){
				$('.catalog-body').html(result);
				//history.pushState(null, null, '/cards');
			}
		});
	});

	$("#clear").click(function(e) {
		e.preventDefault();
		var form = $(this).parents('form');
		
		form.find(".form-check-input").prop('checked', false);
		var option = form.find('option');
		form.find('.text').html(option.eq(0).text());
		option.prop('selected', false);
		$.ajax({
			type: 'POST',
			url: '/cards/filter',
			data: form.serialize()  + '&' + $("#sort").serialize(),
			success: function(result){
				$('.catalog-body').html(result);
				history.pushState(null, null, '/cards');
			}
		});
		
		
	});
	
	$('a.other-page').click(function(e) {
		e.preventDefault();
		
		$.ajax({
			type: 'POST',
			url: '/cards/others',
			context: this,
			data: { 'id': $(this).data('id'),'sets': $(this).data('sets'), 'page': $(this).data('page'),  '_token': $('meta[name="_token"]').attr('content') },
			success: function(result){
				$('.others').html(result);
				$('.page-item').removeClass('active');
				$(this).parent().addClass('active');
			}
		});
	});

	var delItem = function(e) {
		e.preventDefault();

		$.ajax({
			type: "GET",
			context: this,
			url: "/basket/del/",
			data: { id: $(this).data('id'), type: $(this).data('type') },
			success: function(result) {
				var id = $(this).data('id');
				var type = $(this).data('type');
				$('.cards-table').each(function(index, value) {
					var el = $(this).find('[data-id="' + id + '"][data-type="' + type + '"]');
					console.log(el);
					console.log(el.length);
					el.parents('tr').remove();
				});
				if(result.amount == 0) {
					$('#basket').text('Нет товаров');
					$('.dropdown-menu.basket-body > p.text-right').text('корзина пуста');
				} else {
					$('#basket').text(addText(result.amount));
				}

				$('.cards-table.full #total').text(result.sum + 'р.');

				var button = $('button[data-id='+ $(this).attr('data-id') +']');
				button.removeClass('btn-light');
				button.addClass('btn-primary');
				button.attr('data-action', 'add');
				button.text('Заказать');
				button.parents('.goods-item').find('p.relative.hidden').removeClass('hidden');
			}
		});
	}
	$(document).on('click', '.goods-item button[data-action="add"], .single button[data-action="add"]', function(e){
		var amount = $(this).parents('.goods-item').find('.count').val();
		if(typeof amount == 'undefined')
			amount = 1;
		$.ajax({
			type: "GET",
			url: "/basket/add",
			data: { id: $(this).data('id'), amount: amount, type: $(this).data('type') },
			context: this,
			success: function(result) {
				if($('.cards-table a[data-id="' + result[0].id + '"]').length) {
					var atd = $('.cards-table a[data-id="' + result[0].id + '"]').parent().prev();
					var aval = parseInt(atd.text()) + parseInt(amount);
					atd.html(aval + '&nbsp;шт');
				} else {
					var tr = document.createElement("TR");
					$(tr).append('<td><img src="storage/' + result[0].image + '" width="50"></td>');
					$(tr).append('<td>' + result[0].name + '</td>');
					$(tr).append('<td>' + result[0].price + '&nbsp;p</td>');
					$(tr).append('<td>' + amount + '&nbsp;шт</td>');
					$(tr).append('<td><a href="/basket/del/' + result[0].id + '" data-action="del" data-type="' + $(this).data('type') + '" data-id="' + result[0].id + '"><img src="img/del.jpg"></a></td>');
					$('.cards-table').append(tr);
				}
				if(result[1] > 0)
					$('.dropdown-menu.basket-body > p.text-right').html('<a href="/basket" class="btn btn-blue">Оформить</a>');
				$('#basket').text(addText(result[1] ));
				$(this).removeClass('btn-primary');
				$(this).addClass('btn-light');
				$(this).attr('data-action', 'del');
				$(this).text('Удалить');
				$(this).parents('.goods-item').find('p.relative').addClass('hidden');

				var message_success = document.getElementById("basket_message");
				if(!message_success) {
					message_success = document.createElement("DIV");
					$(message_success).addClass('message');
					$(message_success).attr('id', 'basket_message');
					$(message_success).html("Товар добавлен в корзину");
				} else 
					$(message_success).show();
				
				$('header > .container').append(message_success);
				$(document).scrollTop(0);
				setTimeout(function() { $(message_success).hide(); }, 3000);
			}
		});
	});
	$(document).on('click', '.goods-item button[data-action="del"], .single button[data-action="del"]', delItem);
	$(document).on('click', '.cards-table a', delItem);
	
	$('#where_buttons a').click(function(e) {
		e.preventDefault();
		var csrftoken = $('meta[name=_token]').attr('content');
		
		$.ajax({
			type: "POST",
			url: "/cards/ajax",
			context: this,
			beforeSend: function(request) {
				return request.setRequestHeader('X-CSRF-Token', csrftoken);
			},
			data: {'where': $(this).attr('data-where')},
			success: function(result) {
				$('#carousel-goods .carousel-inner').html(result);
				$('#where_buttons a').each(function(){
					if($(this).has('.btn-primary')) {
						$(this).removeClass('btn-primary');
						$(this).addClass('btn-outline-primary');
					}
				});
				$(this).removeClass('btn-outline-primary');
				$(this).addClass('btn-primary');
				checkSlider();
			}
		});
	});
	
	$('#backetform').on('submit', function(e) {
		e.preventDefault();

		$.ajax({
			type: 'POST',
			url: 'basket/send',
			data: $('#backetform').serialize(),
			success: function(result){
				$('main .row').slideUp();
				$('.success').removeClass('d-none');
				$('#basket').text('Нет товаров');
				$('.dropdown-menu.basket-body > p.text-right').text('корзина пуста');
				$('.cards-table').remove()
			}
		});
	});


	/* Фильтр в бустерах */
	$( "#filterSliderPrice" ).slider({
		range: true,
		min: 0,
		max: 500,
		values: [ 0, 312],
		slide: function( event, ui ) {
			var setval1;
			var setval2;
			setval1 = ui.values[ 0 ];
			setval2 = ui.values[ 1 ];
			$("#priceVal_1").html(  setval1  );
			$("#priceVal_2").html( setval2  );
			$("input[name='price_from']").val(ui.values[ 0 ]+'.00');
			$("input[name='price_to']").val(ui.values[ 1 ]+'.00');
		}
	});
	$( "#filterSliderAge" ).slider({
		range: true,
		min: 0,
		max: 19,
		values: [ 0, 19 ],
		slide: function( event, ui ) {
			var val1 = ui.values[ 0 ];
			var val2 = ui.values[ 1 ];
			var setval1;
			var setval2;
			if (val2 < 19) setval2 = 'до '+val2; else setval2 = '';
			setval1 = 'от '+val1;
			if (val1 == 19) setval1 = '18+';
			if (val1 == 0 && val2 == 19)  { setval1 = ''; setval2 = ''; }
			if (val1 == 0 && val2 < 19)  { setval1 = ''; setval2 = 'до '+val2; }
			$("#ageVal_1").html(  setval1  );
			$("#ageVal_2").html(  setval2  );
			$("input[name='age_from']").val(ui.values[ 0 ]);
			$("input[name='age_to']").val(ui.values[ 1 ]);
		}
	});
	$( "#filterSliderGamers" ).slider({
		range: true,
		min: 0,
		max: 9,
		values: [ 0, 9 ],
		slide: function( event, ui ) {
			var val1 = ui.values[ 0 ];
			var val2 = ui.values[ 1 ];
			var setval1;
			var setval2;
			if (val2 < 9) setval2 = 'до '+val2; else setval2 = '';
			setval1 = 'от '+val1;
			if (val1 == 9) setval1 = '8+';
			if (val1 == 0 && val2 == 9)  { setval1 = ''; setval2 = ''; }
			if (val1 == 0 && val2 < 9)  { setval1 = ''; setval2 = 'до '+val2; }
			$("#gamersVal_1").html(  setval1  );
			$("#gamersVal_2").html(  setval2  );
			$("input[name='gamers_from']").val(ui.values[ 0 ]);
			$("input[name='gamers_to']").val(ui.values[ 1 ]);
		}
	});
	$( "#filterSliderTime" ).slider({
		range: true,
		min: 0,
		max: 240,
		values: [ 0, 240 ],
		step: 5,
		slide: function( event, ui ) {
			var val1 = ui.values[ 0 ];
			var val2 = ui.values[ 1 ];
			var setval1;
			var setval2;
			if (val2 < 240) setval2 = 'до '+val2; else setval2 = '';
			setval1 = 'от '+val1;
			if (val1 == 240) setval1 = '240+';
			if (val1 == 0 && val2 == 240)  { setval1 = ''; setval2 = ''; }
			$("#timeVal_1").html(  setval1  );
			$("#timeVal_2").html(  setval2  );
			$("input[name='time_from']").val(ui.values[ 0 ]);
			$("input[name='time_to']").val(ui.values[ 1 ]);
		}
	});
	$('.filter-show-panel-btn').on('click',function(){
		$(this).toggleClass('filter-show-panel-btn-close').closest('.catalog-filter-box').find('.catalog-filter').toggleClass('hidden-xs');
	});
});