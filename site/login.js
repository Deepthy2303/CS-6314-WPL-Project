$(document).ready(function(){
	$("#login").click(function(){

		var action_php = "https://localhost/client_service/loginHandler.php";
	
		var email = $("#email").val();
		var password = $("#password").val();

		// Email regex pattern
		var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
		var test = pattern.test(email);
		


		if( email ==''|| password ==''){
			$('input[type="email"],input[type="password"]').css("border","1px solid red");
			$('input[type="email"],input[type="password"]').css("box-shadow","0 0 3px red");

			$('#error').addClass('alert alert-danger').html("Please fill all the fields...!");
		}
		else if(!test)
		{
			$('input[type="email"]').css("border","1px solid red");
			$('input[type="email"]').css("box-shadow","0 0 3px red");

			$('#error').addClass('alert alert-danger').html("Please enter a valid email...!");
		}
		else {
			$.post(action_php,{ email1: email, password1:password, name:null, imgurl:null, operation:'login'},
				function(data) {
					//console.log(data);
					var response = JSON.parse(data);
					//alert(response["id"]);
					if (response["id"] != 0)
					{
						$("form")[0].reset();
						$('input[type="email"],input[type="password"]').css({"border":"2px solid green","box-shadow":"0 0 5px green"});
						$('#error').addClass('alert alert-success').html("Login Success");	
						var delay = 2000; //ms
						setTimeout(function(){ window.location = 'https://localhost/site/indexs.php'; }, delay);
					}
					else
					{
						$('input[type="email"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
						$('#error').addClass('alert alert-danger').html("Wrong Email or Password");
						// alert(data);						
					}
				});
		}
		
	});
});