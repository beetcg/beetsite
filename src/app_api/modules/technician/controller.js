$( document ).ready(function() {

	var route = {};

	$.getJSON( "./src/app_api/modules/technician/routes.json", function( data ) {
		route = data; 
		console.log(data)
	});

	$('#form_create').on('submit',function(e){
		e.preventDefault()

		console.log('----------------------')
		console.log('Status: Paro el evento')
		console.log('----------------------')
		
		$.ajax({
			beforeSend: function (){
				console.log('Status: tomo los datos')
			},
			url: route.create.url,
			type: route.create.type,
			data: $('#form_create').serialize(),
			success: function (resp) {
				// result = JSON.parse(resp)
				// console.log(result)

				$('#form_create')[0].reset()
				$('#form_message').html('<div class="alert alert-secondary alert-dismissible fade show"> '+
											 					'<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>'+
											 					'<pre>'+ resp + '<pre> </div>')
			},
			error: function (jqXHR,estado,error) {
				console.log('----------------------')
				console.log('Status: Entro en error')
				console.log(estado)
				console.log(error)
			},
			complete: function (jqXHR,estado) {
				console.log('----------------------')
				console.log(estado)
			},
			timeout: 10000
		})		
	})
	
});