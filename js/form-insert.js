$('.insert-form').submit(function(event) {
			event.preventDefault();
			var form_data=new FormData(this);
			var url=$(".insert-form").attr('action');
			var method=$(".insert-form").attr('method');
		    $.ajax({
				url: url,
				type: method,
				data: form_data,        
				processData: false, 
				contentType: false, 
				cache: false,    
			}).done(function(data) {
				var data=jQuery.parseJSON(data);
                
				if(data.status == "success"){
					swal("Good Job!","Insert Successful","success");
					$('#categoryModal').modal('hide');
				}
				else if(data.status == "warning"){
					swal("Opps!","Error","error");
					$('#categoryModal').modal('hide');
				}

			});
		});
	