$(document).ready(function(){
	$("#submit").click(function(){

		var action_php = "http://localhost/client/loginHandler.php";
	
		var name = $("#name").val();

		
			$.post(action_php,{ email1: email, password1:password, name:null, imgurl:null, operation:'edit'},
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
						setTimeout(function(){ window.location = 'http://localhost/website/indexs.php'; }, delay);
					}
					else
					{
						$('input[type="email"],input[type="password"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
						$('#error').addClass('alert alert-danger').html("Wrong Email or Password");
						// alert(data);						
					}
				});
		
		
	});
});