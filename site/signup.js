$(document).ready(function(){
	$("#signup").click(function(){
		
		var action_php = "https://localhost/client_service/loginHandler.php";
		var email = $("#email").val();
		var password = $("#password").val();
		var fname = $("#fname").val();
		var lname = $("#lname").val();
		var valid='false';


	if (email =='')	{
	$('input[type="email"]').css("border","1px solid red");
	$('#error').addClass('alert alert-danger').html("Please fill all the required fields...!");
	valid='false';
	}

	if (password ==''){
	$('input[type="password"]').css("border","1px solid red");
	$('#error').addClass('alert alert-danger').html("Please fill all the required fields...!");
	valid='false';
	}
	if (fname==''){
	$('input[name="fname"]').css("border","1px solid red");
	$('#error').addClass('alert alert-danger').html("Please fill all the required fields...!");
	valid='false';
	}

	var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
	var test = pattern.test(email);



	// Checking for blank fields.
	if(email =='' || password =='' || fname =='' || lname ==''){
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
		var fullname = fname + ' ' + lname;
		//alert (fullname);
		$.post(action_php,
		{
			email1:email, 
			password1:password, 
			name:fullname,
			imgurl:null,
			operation:'signup'
		},
			function(data) {
				var response = JSON.parse(data);
				//alert(response);
				
				if(response['success']=='exist') 
				{
					//user already registered
					$('input[type="email"]').css({"border":"2px solid red","box-shadow":"0 0 3px red"});
					$('#error').addClass('alert alert-danger').html("user exist");
					// alert(data);
				}
				else if(response['success']=='login')
				{
					$("form")[0].reset();
					$('input[type="email"],input[type="password"],input[type="text"]').css({"border":"2px solid green","box-shadow":"0 0 5px green"});
					$('#error').addClass('alert alert-success').html("Your Registration Completed Successfully.");

					var delay = 1000; //Your delay in milliseconds
					setTimeout(function(){ window.location = 'https://localhost/site/indexs.php'; }, delay);
					// alert(data);
				} 
				else{
					$('#error').addClass('alert alert-success').html(data);
					// alert("Some Error Occured..!");
				}
		});
}
});

$("#password").focusout(function() {
        $('#pswd_info').hide();
    });

$('#password').keyup(function(){
	$('#pswd_info').show();

	var pswd = $('#password').val();

	//validate the length
if ( pswd.length < 6 ) {
    $('#length').removeClass('valid').addClass('invalid');
} else {
    $('#length').removeClass('invalid').addClass('valid');
}

//validate letter
if ( pswd.match(/[A-z]/) ) {
    $('#letter').removeClass('invalid').addClass('valid');
} else {
    $('#letter').removeClass('valid').addClass('invalid');
}

//validate capital letter
if ( pswd.match(/[A-Z]/) ) {
    $('#capital').removeClass('invalid').addClass('valid');
} else {
    $('#capital').removeClass('valid').addClass('invalid');
}

//validate number
if ( pswd.match(/\d/) ) {
    $('#number').removeClass('invalid').addClass('valid');
} else {
    $('#number').removeClass('valid').addClass('invalid');
}								

        $('#resultpass').html(checkStrength($('#password').val()));
    })

function checkStrength(password){ 
	//initial strength 
	var strength = 0 ;

	//if the password length is less than 6, return message. 
	if (password.length < 6) 
	{ 
		$('#result').removeClass();
		$('#result').html('short');
		return 'Too short';
	} 

	//length is ok, lets continue. 

	//if length is 8 characters or more, increase strength value 
	if (password.length > 7)
		strength += 1;

	//if password contains both lower and uppercase characters, increase strength value 
	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))
		strength += 1;

	//if it has numbers and characters, increase strength value 
	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/))
		strength += 1;

	//if it has one special character, increase strength value 
	if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/))
		strength += 1;

	//if it has two special characters, increase strength value 
	if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,",%,&,@,#,$,^,*,?,_,~])/))
		strength += 1 ;

	//now we have calculated strength value, we can return messages 

	//if value is less than 2 
	if (strength < 2 ) { $('#result').removeClass() 
		$('#result').html('weak');
		return 'Weak';
	}
	else if (strength == 2 )
	{ 
			$('#result').removeClass(); 
			$('#result').html('good');
			return 'Good';
		} 
	else 
		{
			$('#result').removeClass();
			$('#result').html('strong');
			return 'Strong';
		}
}



});