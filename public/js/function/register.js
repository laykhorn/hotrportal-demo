// JavaScript Validation For Registration Page

$('document').ready(function()
{ 		 		

		$("#create_account").addClass('active').load();
		
		 // name validation
		 var unameregex = /^[a-zA-Z]+$/;
		 
		 $.validator.addMethod("validuname", function( value, element ) {
		     return this.optional( element ) || unameregex.test( value );
		 }); 
                 
                 // Firstname validation
		 var fnameregex = /^[a-zA-Z]+$/;
		 
		 $.validator.addMethod("validfname", function( value, element ) {
		     return this.optional( element ) || fnameregex.test( value );
		 }); 
                 
                 // Lastname validation
		 var lnameregex = /^[a-zA-Z]+$/;
		 
		 $.validator.addMethod("validlname", function( value, element ) {
		     return this.optional( element ) || lnameregex.test( value );
		 }); 
		 
		 // valid email pattern
		 var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		 
		 $.validator.addMethod("validemail", function( value, element ) {
		     return this.optional( element ) || eregex.test( value );
		 });
                 
		 // validate Phone number
                 var phoneregex = /^[0-9]+$/;
                 $.validator.addMethod("validphone", function(value, element){
                     return this.optional(element) || phoneregex.test (value);
                 });
		 $("#register-form").validate({
					
		  rules:
		  {
				txtuname: {
					required: true,
					validuname: true,
					minlength: 4,
                                        maxlength: 12,
                                remote: {
                                    url: baseUrl+"/library/account/signup_checks/check-username.php",
					type: "POST",
					data: {
						name: function() {
							return $( "#user_username" ).val();
						}
					}
                                }
				},
                                
                                txtfname: {
					required: true,
					validfname: true,
					minlength: 4,
                                        maxlength: 10,
				},
                                
                                txtlname: {
					required: true,
					validlname: true,
					minlength: 4,
                                        maxlength: 10,
				},
                                
				txtuemail : {
				required : true,
				validemail: true,
				remote: {
					url: baseUrl+"/library/account/signup_checks/check-email.php",
					type: "POST",
					data: {
						email: function() {
							return $( "#user_email" ).val();
						}
					}
				}
				},
                                
                                txtcountry: {
                                            required: true,
                                
                                },
                                
                                txtuphone: {
					required: true,
					validphone: true,
					minlength: 4,
                                        maxlength: 15,
                                remote: {
                                    url: baseUrl+"/library/account/signup_checks/check-phone.php",
					type: "POST",
					data: {
						phone: function() {
							return $( "#user_phone" ).val();
						}
					}
                                }
				},
                                
                                txtgender: {
                                            required: true,
                                
                                },
                                
				password: {
					required: true,
					minlength: 8,
					maxlength: 15
				},
				cpassword: {
					required: true,
					equalTo: '#password'
				},
                                txtaccept: {
                                        required:true,
                                },
		   },
		   messages:
		   {
				txtuname: {
					required: "Username is required",
					validuname: "Username must contain only alphabets",
					minlength: "The username is too short",
                                        maxlength: "The username is too long",
                                        remote : "The Username has been taken by another "+churchName+" account"
					  },
                                          
                                txtfname: {
					required: "First Name is required",
					validfname: "First Name must contain only alphabets",
					minlength: "First Name is too short",
                                        maxlength: "First Name is too long",
					  },
                                
                                
                                txtlname: {
					required: "Last Name is required",
					validlname: "Last Name must contain only alphabets",
					minlength: "The Last Name is too short",
                                        maxlength: "The Last Name is too long",
					  },
				txtuemail : {
				required : "Email is required",
				validemail : "Please enter valid email address",
				remote : "The email address belongs to another "+churchName+" account",
                                },
                                
                                txtcountry: {
                                        required: "Country is required",
                                }, 
                                
                                txtuphone: {
					required: "Phone Number is required",
					validphone: "Phone must contain only digit",
					minlength: "The phone number is too short",
                                        maxlength: "The phone number is too long",
                                        remote : "The phone number belongs to another "+churchName+" account",
					  },
                                          
                                txtgender: {
                                        required: "Gender is required",
                                }, 
				password:{
					required: "Password is required",
					minlength: "Password at least have 8 characters"
					},
				cpassword:{
					required: "Retype your password",
					equalTo: "Password did not match !"
					},
                                txtaccept:{
                                        required: "You must agree with our Terms and policy to proceed your account creation"
                                }
		   },
		  errorPlacement : function(error, element) {
			  $(element).closest('.form-group').find('.help-block').html(error.html());
		   },
                   
                   
                   
                   
                   
		   highlight : function(element) {
			  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		   },       
		   unhighlight: function(element, errorClass, validClass) {
			  $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
			  $(element).closest('.form-group').find('.help-block').html('<span class="glyphicon glyphicon-ok form-control-feedback"></span>');
		   },
		   	
				submitHandler: submitForm
				
		   }); 
		   function submitForm(){
			   
			   $.ajax({
				
				      type : 'POST',
					  async: false,
					  url  : baseUrl+"/library/account/signup_checks/ajax-signup.php",
					  data : $('#register-form').serialize(),
					  dataType : 'json',
					 			  
					  success : function(data){
						  
						  
							  console.log(data);
							  
							  
								$('#btn-signup').html('<img src="library/account/signup_checks/ajax-loader.gif" /> &nbsp; signing up...').addClass('disabled').attr('disabled', 'disabled');
								$(".container").addClass('disabled');
							   setTimeout(function(){
								   
								   if ( data.status==='success' ) {
									   
									    $("#successAccountModal").modal({backdrop: false, keyboard: false}).slideDown(200, function(){
											$('#errorDiv').delay(3000).slideUp(100);
											$("#register-form")[0].reset();
											$('#btn-signup').removeClass('disabled');
											$(".help-block").empty();
											$("#login_page").click(function(){
												window.location.href = "home"; 
											});
											$(".has-success").removeClass();
											setTimeout(' window.location.href = "home"; ',5000);
											$(".container").removeClass('disabled');
											$('#btn-signup').removeClass('disabled').removeAttr('disabled').html('Sign Me up !');
							   	  	   });
									   
								   } else {
									   
									    $("#nosuccessAccountModal").modal({backdrop: false, keyboard: false}).slideDown(200, function(){
											 $("#errorAccountModal").modal('hide');
											 $('#errorDiv').delay(3000).slideUp(100);
											 $('#btn-signup').html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Processing');
											 $('#btn-signup').removeAttr('disabled');
											 setTimeout(' window.location.href = "create_account"; ',6000);
											 $("#nosuccessbutton").click(function(){
												window.location.href = "create_account"; 
											});
											 $("#register-form")[0].reset().removeClass('has-success');
										 });
								   }
								  
							   },3000);
							   
							   
					  },
					  error: function(){
						  $("#errorAccountModal").modal({backdrop: false, keyboard: false}).slideDown(200, function(){
								$("#register-form")[0].reset();
								setTimeout(' window.location.href = "create_account"; ',6000);
								$(".help-block").empty();
								$("#error_page").click(function(){
									window.location.href = "create_account"; 
								});
								$(".has-success").removeClass();
						  });
					  }
				   
			   });
			   
			   return false;
		   }
});