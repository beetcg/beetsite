$( document ).ready(function() {
	var route = {};

	$.getJSON("./src/app_api/modules/technician/routes.json", function(data) { route = data; });

	$('#form_create').on('submit',function(e){
		e.preventDefault()
		$.ajax({
			beforeSend: function (){
				$('#sub').html('<i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>')
			},
			url: route.create.url,
			type: route.create.type,
			data: $('#form_create').serialize(),
			success: function (resp) {
				res = JSON.parse(resp)
				if (res.save == true) {
					$('#form_create')[0].reset()
					$('#sub').html('<i style="color:green;" class="fa fa-floppy-o" aria-hidden="true"></i>')
				} else {
					$('#sub').html('<i style="color:red;" class="fa fa-exclamation-circle" aria-hidden="true"></i>')
				}
				console.log(res)
				$('#form_message').html(	
					'<div class="alert alert-light alert-dismissible fade show" role="alert">'+
					'		<ul>'+
					'			<li>Connection : '+res.connection+'</li>'+
					'			<li>Found : '+res.found+'</li>'+
					'			<li>Save : '+res.save+'</li>'+
					'		</ul>'+
					'		<button class="close" data-dismiss="alert" aria-label="Close">'+ 
					'			<i class="fa fa-window-close" aria-hidden="true"></i>'+
					'		</button>'+
					'</div>' )
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

	$('#form_confirm').on('submit',function(e){
				e.preventDefault()

				var formData = new FormData;
				formData.append('id', $('#id').val())
				formData.append('salt', $('#salt').val())

				formData.append('id_card', $('#id_card')[0].files[0])

				if ($('#hardware').is(':checked')) {
					formData.append('hardware', $('#hardware').val())
				} else {
					formData.append('hardware', '0')
				}
				if ($('#printing').is(':checked')) {
					formData.append('printing', $('#printing').val())
				} else {
					formData.append('printing', '0')
				}
				if ($('#security').is(':checked')) {
					formData.append('security', $('#security').val())
				} else {
					formData.append('security', '0')
				}
				if ($('#television').is(':checked')) {
					formData.append('television', $('#television').val())
				} else {
					formData.append('television', '0')
				}
				if ($('#virus').is(':checked')) {
					formData.append('virus', $('#virus').val())
				} else {
					formData.append('virus', '0')
				}
				if ($('#network').is(':checked')) {
					formData.append('network', $('#network').val())
				} else {
					formData.append('network', '0')
				}
				if ($('#telephone').is(':checked')) {
					formData.append('telephone', $('#telephone').val())
				} else {
					formData.append('telephone', '0')
				}
				if ($('#servers').is(':checked')) {
					formData.append('servers', $('#servers').val())
				} else {
					formData.append('servers', '0')
				}

				$.ajax({
					beforeSend: function (){
						$('#sub').html('<i class="fa fa-spin fa-circle-o-notch" aria-hidden="true"></i>')
					},
					url: route.confirm.url,
					type: route.confirm.type,
					data: formData,
					processData: false,
					contentType: false,
					cache: false,
					success: function (resp) {
						var res = JSON.parse(resp)
						console.log(res)
						if (res.update == true) {
							$('#sub').html('<i style="color:green;" class="fa fa-floppy-o" aria-hidden="true"></i>')
						} else {
							$('#sub').html('<i style="color:red;" class="fa fa-exclamation-circle" aria-hidden="true"></i>')
						}
					},
					error: function (jqXHR,estado,error) {
						console.log('----------------------')
						console.log('Status: Entro en error')
						console.log(estado)
						console.log(error)
					},
					complete: function (jqXHR,estado) {
					},
					// timeout: 10000
				})		
			})
	
});