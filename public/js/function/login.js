// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		
		// Login validation
                
				$("#login").addClass('active').load();
				
                
                var uinputregex = /^[a-zA-Z0-9\.\@\_\-]+$/;
                $.validator.addMethod("validuinput", function( value, element ) {
		return this.optional( element ) || uinputregex.test( value );
		 });
		 
		 $("#login-form").validate({
					
		  rules:
		  {
				user_id: {
					required: true,
					validuinput: true,
				
				},
                                
                                
                                password: {
					required: true,
				},
                                
		   },
		   messages:
		   {
				user_id: {
					required: "Please Enter your Username or Phone Number or Email",
                                        validuinput: "Input must contain Alphabet, Digit, @, _, - only",
					},
                                        
                                password:{
					required: "Please enter your password",
					},
				
		   },
		   errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
                   
                   
                   
                   
                   
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
                          $(".login-btn-disabled").addClass('disabled');
		   },       
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error');
			  $(element).closest('.form-group').find('.help-block').html('');
                          $(".login-btn-disabled").removeClass('disabled');
		   },
		   	
				submitHandler: submitForm
				
		   }); 
		   
		/* login submit */
	   function submitForm()
	   {		
			var data = $("#login-form").serialize();
				
			$.ajax({
				
			type : 'POST',
			url  : baseUrl+'/library/account/login_checks/login_process.php',
			data : data,
			beforeSend: function()
			{	
				
                               // $('#errorLoginModal').delay(3000).slideUp(10000);
                                $("#btn-login").html('<span class="fa fa-spinner" style="font-size: 30px;animation: fa-spin 1s infinite linear;color: #fff;"></span> &nbsp; Processing ...');
                                $(".container").addClass('disabled');
			},
			success :  function(response)
			   {						
					if(response==="ok"){
									
						$("#btn-login").html('<i class="fa fa-spinner" style="font-size: 30px;animation: fa-spin 1s infinite linear;color: #fff;"></i> &nbsp; Processing ...');
                                                $('#btn-login').removeAttr('disabled');
						setTimeout(' window.location.href = "home"; ',10000);
                                                
					}
					else{
									//$("#errorLoginModal").modal({backdrop: false, keyboard: false});
							 $("#errorLoginModal").modal({backdrop: false, keyboard: false}).slideDown(10000, function(){
												$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
                                                $(".container").removeClass('disabled');
                                               // $(".btn-disabled-other").removeClass('disabled');
                                                $("#login-form")[0].reset();
											    setTimeout(' window.location.href = "login"; ',4000);
												$("#error_login").click(function(){
													window.location.href = "login"; 
												});
                                                
									});
					}
			  },
                          error: function(){
							  $("#errorAccountModal").modal({backdrop: false, keyboard: false}).slideDown(200, function(){
								$("#register-form")[0].reset();
								setTimeout(' window.location.href = "login"; ',6000);
								$(".help-block").empty();
								$("#error_page").click(function(){
									window.location.href = "login"; 
								});
								$(".has-success").removeClass();
						  });
							  
						  }
			});
				return false;
		}
	   /* login submit */
});