$(document).ready(function() {
	$('.send').click(function(e) {
		e.preventDefault();
		var email = $(this).data('email');
		var id = email? $(this).next().val() : this.id;
		if(email) {
			$.ajax({
				type: 'POST',
				url: '/subscribe/send',
				data: {'id': id, 'email': email},
				success: function(result){
					console.log(result);
				}
			});
		} else {
			$.ajax({
				type: 'POST',
				url: '/subscribe/sendAll',
				data: {'id': id },
				success: function(result){
					console.log(result);
				}
			});
		}
	});
	
	$('.renew-price-list').click(function(){
		$.ajax({
			type: 'POST',
			url: '/exel',
			success: function(result){
				var message_success = document.getElementById("exel_message");
				if(!message_success) {
					message_success = document.createElement("DIV");
					$(message_success).addClass('message');
					$(message_success).attr('id', 'exel_message');
					$(message_success).html("Прайс-лист обновлен");
				} else 
					$(message_success).show();
				
				$('body').append(message_success);
				$(document).scrollTop(0);
				setTimeout(function() { $(message_success).hide(); }, 3000);
			}
		});
	});

	$('.renew-price').click(function(){
		$.ajax({
			type: 'POST',
			url: '/exel/read',
			success: function(result){
				var message_success = document.getElementById("price_message");
				if(!message_success) {
					message_success = document.createElement("DIV");
					$(message_success).addClass('message');
					$(message_success).attr('id', 'price_message');
					$(message_success).html("Цены обновлены");
				} else 
					$(message_success).show();
				
				$('body').append(message_success);
				$(document).scrollTop(0);
				setTimeout(function() { $(message_success).hide(); }, 3000);
			}
		});
	});
});