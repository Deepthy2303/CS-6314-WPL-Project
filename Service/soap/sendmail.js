

$(document).ready(function(){
	$("#sub").click(function(){
		
		var email = "surbhi.mathur22@gmail.com";//$("#InputEmail").val();
		var name = "surbhi mathur";//$("#InputName").val();
		var message = "howdy"; //$("#InputMessage").val();
				
		if (email =='')	{
	$('input[type="email"]').css("border","1px solid red");
	$('#error').addClass('alert alert-danger').html("Please fill all the required fields...!");
	valid='false';
	}
		
		
	
	if(email =='' ||){
		// $('input[type="email"],input[type="password"]').css("border","1px solid red");
		// $('input[type="email"],input[type="password"]').css("box-shadow","0 0 3px red");
		// alert("Please fill all fields...!!!!!!");
		$('#error').addClass('alert alert-danger').html("Please fill all the required fields...!");
		// alert(valid);
	}
	else if(!test)
		{
			$('input[type="email"]').css("border","1px solid red");
			$('input[type="email"]').css("box-shadow","0 0 3px red");
			// alert("Please enter a valid email...!");
			$('#error').addClass('alert alert-danger').html("Please enter a valid email...!");
		}
	else {
		// alert('start');
		$.post("http://localhost/mailer/PHP/examples/gmail.php",{Email:email, Name: name, Msg: message},
			function(data) {
				if(data=='Fail') {
					$('input[type="email"],input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
					$('#error').addClass('alert alert-danger').html(data);
					// alert(data);
				}
				else if(data=='Internal Error...!'){
					$('input[type="email"],input[type="password"],input[type="text"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
					$('#error').addClass('alert alert-danger').html("Sorry Some Internal Error Occured. Please try again later...!");
					// alert(data);
				}
				 else if(data=='Your Registration Completed Successfully...! An email has been sent to you'){
					$("form")[0].reset();
					$('input[type="email"],input[type="text"]').css({"border":"2px solid green","box-shadow":"0 0 5px green"});
					$('#error').addClass('alert alert-success').html("Your Registration Completed Successfully. Redirecting to login...");

					var delay = 1000; //Your delay in milliseconds
					setTimeout(function(){ window.location = 'localhost/book3/indexs.php'; }, delay);
					// alert(data);
				} else{
					$('#error').addClass('alert alert-success').html(data);
					// alert("Some Error Occured..!");
				}
		});
}
});