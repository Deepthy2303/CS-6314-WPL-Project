<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
        <style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #777777;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
               $('.striped tr:even').addClass('alt');
            });
        </script>
        <title></title>
    </head>
    <body>
	<table class="striped">
            <tr class="header">
                <td>Id</td>
                <td>Name</td>
                <td>Title</td>
            </tr>
            <tr>
                <td>
				Userid: <input type="text" id="userid">
				</td>
                <td>
				bookid: <input type="text" id="bookid">
				</td>
                <td>
				Operation: <input type="text" id="operation">
				</td>
            </tr>

		</table>
		<br/>
		<button onClick="getData()"> test cart</button> 
    </body>
	<script> 
//$(document).ready(function(){
function getData()
{
	

console.log("starting");
  $.post
  (
  "http://localhost/client_service/ordersHandler.php", 
  {
	userid: $("#userid").val(),
	bookid: $("#bookid").val(),
	operation: $("#operation").val()
  },
  function(data)
  {
	
	var response = JSON.parse(data);
	
	console.log(response)
	
	//console.log(response.length);
	//console.log(response[0].author);
  }
  );
  
 // console.log('ID: ' + profile.getId()); // Do not send to your backend! Use an ID token instead.
  //console.log('Name: ' + profile.getName());
  //console.log('Image URL: ' + profile.getImageUrl());
  //console.log('Email: ' + profile.getEmail());

//});
}

</script>
</html>