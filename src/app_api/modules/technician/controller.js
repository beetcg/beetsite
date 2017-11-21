$( document ).ready(function() {
	var route = {};

	$.getJSON("./src/app_api/modules/technician/routes.json", function(data) { route = data; });

	$('#form_create').on('submit',function(e){
		e.preventDefault()

		$.ajax({
			beforeSend: function (){
			},
			url: route.create.url,
			type: route.create.type,
			data: $('#form_create').serialize(),
			success: function (resp) {
				$('#form_create')[0].reset()
				$('#form_message').html('<div class="alert alert-secondary alert-dismissible fade show"> '+
											 					'<a class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </a>'+
											 					'<pre>'+ resp + '<pre> </div>')
			},
			error: function (jqXHR,estado,error) {
				console.log('----------------------')
				console.log('Status: Entro en error')
				console.log(estado)
				console.log(error)
			},
			complete: function (jqXHR,estado) {
			},
			timeout: 10000
		})		
	})
	
});