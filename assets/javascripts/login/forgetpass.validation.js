		jQuery.validator.addMethod("u_email", function(value, element, param) {
		    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
		},'admin email id is wrong!');	
		// validate signup form on keyup and submit



		$("#forgetPass").validate({
			//errorClass: 'help-block',
			rules: {				
				 femail: {
		            required: true,
		            u_email: true,		            
		            maxlength: 255,
		         },				
			},
			messages: {
				femail: {					
					required: "Please enter your email address.",					
				},				
			}
		});

		$.validator.setDefaults({			
		    highlight: function(element) {
		        $(element).closest('.form-group').addClass('has-error');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').removeClass('has-error');
		    },
		    errorElement: 'span',
		    errorClass: 'help-block',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		           error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element);
		        }
		    }
		});