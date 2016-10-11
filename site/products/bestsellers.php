 <?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css1/bootstrap.min.css" rel="stylesheet">
    <link href="css1/font-awesome.min.css" rel="stylesheet">
	<link href="css/general.css" rel="stylesheet">
    <link href="css1/prettyPhoto.css" rel="stylesheet">
    <link href="css1/price-range.css" rel="stylesheet">
    <link href="css1/animate.css" rel="stylesheet">
	<link href="css1/main.css" rel="stylesheet">
	<link href="css1/responsive.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	<style>
	th {
    background-color: #2CA8FF;
	text-align: center;
}
</style>
</head><!--/head-->

<body>

<!-- NavBar-->
	<nav class="navbar-default" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="indexs.php">Purchase Books in a Click!</a>
			</div>

			<div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
				<ul class="nav navbar-nav">

					<li class="menuItem"><a href="cart.php">Cart</a></li>
					<li class="menuItem"><a href="#contact">Contact Us</a></li>
				</ul>
			</div>
		   
		</div>
	</nav>
	
	<br />
	<section>
	  
	<table id="dataTable" border="1" style="width:100%">
  <tr>
    <th>Cover</th>
    <th>Name</th>		
    <th>Price</th>
  </tr>
  
</table>
      </section>
	

</body>

	<script src="js1/jquery.js"></script>
	<script src="js1/bootstrap.min.js"></script>
	<script src="js1/jquery.scrollUp.min.js"></script>
    <script src="js1/jquery.prettyPhoto.js"></script>
    <!--<script src="js1/main.js"></script>-->
<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script> 
$(document).ready(function()
{
  $.post
  (
  "http://localhost/client/booksHandler.php", 
  {
	title:null,
	genre:'Literature'	
  },
  function(data)
  {
	
	var response = JSON.parse(data);
	console.log(response.length);
	console.log(response[0].author);

for (var key=0, size=response.length; key<size;key++) {

  $('<tr>')
            .append( $('<td>').html('<img src = '+response[key].cover+ '>'
            ) )
            .append( $('<td>').html(
                response[key].title
            ) )
            .append( $('<td>').html(
                response[key].price
            ) )
            .appendTo('#dataTable');
}
	//$('#dataTable').html(r.join('')); 
	//$('#dataTable').html('<tr><td>a</td><td>b</td><td>c</td></tr>'); 
	//console.log(r.join(''));
 
  }
  );
});

</script>

</html>