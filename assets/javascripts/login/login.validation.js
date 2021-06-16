		jQuery.validator.addMethod("u_email", function(value, element, param) {
		    return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
		},'admin email id is wrong!');	
		// validate signup form on keyup and submit


		$("#signinForm").validate({
			errorClass: 'has-error',
			rules: {				
				 u_email: {
		            required: true,
		            u_email: true,		            
		            maxlength: 255,
		         },
				password: {
					required: true,
					minlength: 3
				},				
				agree: "required"
			},
			messages: {
				u_email: {					
					required: "Please enter your email address.",
					
				},
				password: {
					required: "Please provide a password",
					minlength: "Passwords can't be shorter than seven characters",
                	maxlength: "Passwords must be shorter than forty characters",
				},				
				agree: "Please accept our policy",
						
		},
			highlight: function(element) {
		        $(element).closest('.form-group').addClass('has-error');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').removeClass('has-error');
		    },
		    errorElement: 'span',
		    errorClass: 'has-error',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		           error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element);
		        }
		    },
		     submitHandler: function(form) {
		         // do other things for a valid form
		         form.submit();
		     }
		});
		
		/*$.validator.setDefaults({			
		    highlight: function(element) {
		        $(element).closest('.form-group').addClass('has-error');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').removeClass('has-error');
		    },
		    errorElement: 'label',
		    errorClass: 'has-error',
		    errorPlacement: function(error, element) {
		        if(element.parent('.input-group').length) {
		           error.insertAfter(element.parent());
		        } else {
		            error.insertAfter(element);
		        }
		    },
		     submitHandler: function(form) {
		         // do other things for a valid form
		         form.submit();
		     }
		});*/