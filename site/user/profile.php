 <?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}		
	//echo $_SESSION['user_name'];
	
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="The biggest online book store ">
    <meta name="author" content="">
  <link rel="stylesheet" type="text/css" media="all" href="css2/styles.css">
<!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Arvo:400,700' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<style>
	th {
    background-color: #2CA8FF;
}
</style>
	
	<script type="text/javascript" src="js2/jquery-1.10.2.min.js"></script>
</head>

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
  
  <div id="w">
    <div id="content" class="clearfix">

      <nav id="profiletabs">
        <ul class="clearfix">
          <li><a href="#orders">Order History</a></li>
          <li><a href="#settings">Settings</a></li>
        </ul>
      </nav>
      
      
      
      <section id="orders" class="hidden">
	  
	  <table border="1" style="width:100%">
  <tr>
     <th>Cover</th>
    <th>Name</th>		
    <th>Price</th>
	<th>Date</th>
	<th>Address</th>
  </tr>
  <tr>
     <td></td>
    <td></td>		
    <td></td>
	<td></td>
	<td></td>
  </tr>
  <tr>
     <td></td>
    <td></td>		
    <td></td>
	<td></td>
	<td></td>
  </tr>
</table>
      </section>
      
      <section id="settings" class="hidden">
	  <form>
        <p>Edit your user settings:</p>
        
		
        <p class="setting">Name:<br /><input type="text" value=<?php echo $_SESSION['user_name']; ?>></input></p>
        
        <p class="setting">E-mail:<br /><input type="text" value=<?php echo $_SESSION['email']; ?>></input></p>
        
        <p class="setting">Mobile Phone Number:<br /><input type="text"></input></p>
        
        <p class="setting">Password:<br /><input type="password"></input></p>
		
		<p class="setting">Address:<br /><input type="text"></input></p>
		
		
		<button type="button">Submit<img src="images2/edit.png" alt="*Edit*"></button>
        </form>
      </section>
    </div><!-- @end #content -->
  </div><!-- @end #w -->
<script type="text/javascript">
$(function(){
  $('#profiletabs ul li a').on('click', function(e){
    e.preventDefault();
    var newcontent = $(this).attr('href');
    
    $('#profiletabs ul li a').removeClass('sel');
    $(this).addClass('sel');
    
    $('#content section').each(function(){
      if(!$(this).hasClass('hidden')) { $(this).addClass('hidden'); }
    });
    
    $(newcontent).removeClass('hidden');
  });
});
</script>

</body>
</html>