	$("#resetform").validate({
		errorClass: 'has-error',
		rules: {				
			 password: {
	            required: true,
	            minlength: 3,
	         },
			passconf: {
				required: true,
				minlength: 3,
				equalTo : "#password",
			},			
			
		},
		messages: {
			password: {					
				required: "Please enter your email address.",
				
			},
			passconf: {
				required: "Please provide a password",
				minlength: "Passwords can't be shorter than seven characters",
            	maxlength: "Passwords must be shorter than forty characters",
			},				
				
						
		},
			highlight: function(element) {
		        $(element).closest('.form-group').addClass('has-error');
		    },
		    unhighlight: function(element) {
		        $(element).closest('.form-group').removeClass('has-error');
		    },
		    //errorElement: 'span',
		    //errorClass: 'has-error',
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
		
		