 <?php
	session_start();

	if (isset($_GET['InputEmail']))
	{
	$command = "powershell C:\\wamp\\www\\client_service\\email.ps1 ".$_GET['InputEmail'];
		
		echo exec($command,$output);	
	}



?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="The Mega online book store ">
    <meta name="author" content="SDS">

    <title>The ultimate book store</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 
    <!-- Custom Google Web Font -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href='css/google_api_fonts.css' rel='stylesheet' type='text/css'>
	<link href='css/google_api_arvo.css' rel='stylesheet' type='text/css'>
	
    <!-- Custom CSS-->
    <link href="css/general.css" rel="stylesheet">
	
	 <!-- Owl-Carousel -->
    <link href="css/custom.css" rel="stylesheet">
	<link href="css/owl.carousel.css" rel="stylesheet">
    <link href="css/owl.theme.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	
	<!-- Magnific Popup core CSS file -->
	<link rel="stylesheet" href="css/magnific-popup.css"> 
	
	<script src="js/modernizr-2.8.3.min.js"></script>  <!-- Modernizr /-->

</head>

<body id="home">

	<!-- Preloader -->
	<div id="preloader">
		<div id="status"></div>
	</div>
	
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
					
					<li class="menuItem"><a href="#features">Features</a></li>
					<li class="menuItem"><a href="#categories">Categories</a></li>
					<li class="menuItem"><a href="new.php">New Releases</a></li>
					<li class="menuItem"><a href="cart.php">Cart</a></li>
					<li class="menuItem"><a href="#contact">Contact Us</a></li>
					
				</ul>
			</div>
		   
		</div>
	</nav>
	
					<!-- FullScreen -->
					<div class="intro-header">
						<div class="col-xs-12 text-center abcen1">
							<h1 class="h1_home wow fadeIn" data-wow-delay="0.4s">SDS</h1>
							<h3 class="h3_home wow fadeIn" data-wow-delay="0.6s">Take a look, Read a book!</h3>
							
							<?php if(isset($_SESSION['user_id'])): ?>
							
							<p>Hello <?php echo $_SESSION['user_name'];?></p>
							<ul class="list-inline intro-social-buttons">
							<li><a href="logout.php" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Logout</span></a>
								</li>
								<li id="download" ><a href="profile.php" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Profile</span></a>
										
								</li>
								<li id="download" ><a href="order_history.php" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Order History</span></a>
										
								</li>
							</ul>
							
							
							<?php else: ?>
							
							<ul class="list-inline intro-social-buttons">
							<li><a href="signup.php" class="btn  btn-lg mybutton_cyano wow fadeIn" data-wow-delay="0.8s"><span class="network-name">Sign Up</span></a>
								</li>
								<li id="download" ><a href="login.php" class="btn  btn-lg mybutton_standard wow swing wow fadeIn" data-wow-delay="1.2s"><span class="network-name">Login</span></a>
										
								</li>
							</ul>
							
							<?php endif; ?>
						</div>
						<!-- /.container -->
						<div class="col-xs-12 text-center abcen wow fadeIn">
							<div class="button_down "> 
								<a class="imgcircle wow bounceInUp" data-wow-duration="1.5s"  href="#categories"> <img class="img_scroll" src="img/icon/circle.png" alt=""> </a>
							</div>
						</div>
					</div>
	
	 
	
	<!-- Features -->
					<div id="features" class="content-section-a">
						<div class="container">
							<div class="row">
										
								<div class="col-md-6 col-md-offset-3 text-center wrap_title">
									<h2>Features</h2>
									<p class="lead" style="margin-top:0">You can do many exciting things here !</p>
								</div>

								<div class="col-sm-6  block wow bounceIn">
									<div class="row">
										<div class="col-md-4 box-icon rotate"> 
											<a href=""><i class="fa fa-pencil fa-4x "> </i> </a>
										</div>
										<div class="col-md-8 box-ct">
											<h3> Reading Rewards! </h3>
											<p> Receive a coupon for $5.00 every time you spend $50.00</p>
										</div>
									</div>
								</div>
								<div class="col-sm-6 block wow bounceIn">
									<div class="row">
										<div class="col-md-4 box-icon rotate"> 
											<a href="tendollar.php"><i class="fa fa-picture-o fa-4x "> </i> </a>
										</div>
										<div class="col-md-8 box-ct">
											<h3> Under $10 Books! </h3>
											<p> Click the pic here to view all the books under $10!<br/>
										
										</div>
									</div>
								</div>
							</div>

							<div class="row tworow">
								<div class="col-sm-6  block wow bounceIn">
									<div class="row">
										<div class="col-md-4 box-icon rotate"> 
										<a href="search.php"><i class=" fa fa-search fa-4x "> </i> </a>
											
										</div>
										<div class="col-md-8 box-ct">
											<h3> Search </h3>
											<p> Click the pic to search for a particular book! </p>
											<a href="search.php"></a>
										</div>
									</div>
								</div>
								<div class="col-sm-6 block wow bounceIn">
									<div class="row">
										<div class="col-md-4 box-icon rotate"> 
											<a href="profile.php"><i class="fa fa-user fa-4x"></a></i> 
										</div>
										<div class="col-md-8 box-ct">
											<h3> Profile </h3>
											<p> Click the pic to manage your profile!</p> 
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
<!-- Categories -->
			<div id="categories" class="content-section-b" style="border-top: 0">
				<div class="container">

					<div class="col-md-6 col-md-offset-3 text-center wrap_title">
						<h2>Categories</h2>
						<p class="lead" style="margin-top:0">View books by selecting a category.!</p>

					</div>

					<div class="row">

						<div class="col-sm-4 wow fadeInDown text-center">
							<a href="bestsellers.php">
							<img class="rotate" src="img/icon/book.svg" alt="Generic placeholder image" height="100px" width="100px">
							</a>
							<h3>Bestsellers</h3>
							
						</div>

						<div class="col-sm-4 wow fadeInDown text-center">
							<a href="academic.php">
							<img  class="rotate" src="img/icon/laptop.svg" alt="Generic placeholder image" height="100px" width="100px">
							</a>
							<h3>Academic &amp; Professional</h3>
							<p class="lead"></p>
							<!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
						</div><!-- /.col-lg-4 -->

						<div class="col-sm-4 wow fadeInDown text-center">
						<a href="literature.php">
							<img  class="rotate" src="img/icon/letter.svg" alt="Generic placeholder image" height="100px" width="100px">
							</a>
							<h3>Literature &amp; Fiction</h3>
							<p class="lead"></p>
							<!-- <p><a class="btn btn-embossed btn-primary view" role="button">View Details</a></p> -->
						</div><!-- /.col-lg-4 -->

					</div><!-- /.row -->

					

					

					</div><!-- /.container -->

				</div>
	
	

	
	<!-- Contact -->
	<div id="contact" class="content-section-a">
		<div class="container">
			<div class="row">
			
			<div class="col-md-6 col-md-offset-3 text-center wrap_title">
				<h2>Contact Us</h2>
				<p class="lead" style="margin-top:0">We would love to get in touch with you!</p>
			</div>
			
			<form onsubmit="myFunction(); return false;">
				<div class="col-md-6">
					<div class="form-group">
						<label for="InputName">Your Name</label>
						<div class="input-group">
							<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Enter Name" required>
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="InputEmail">Your Email</label>
						<div class="input-group">
							<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Enter Email" required  >
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="InputMessage">Message</label>
						<div class="input-group">
							<textarea name="InputMessage" id="InputMessage" class="form-control" rows="5" required></textarea>
							<span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span>
						</div>
					</div>

					<input type="submit" name="submit" id="submit_btn_contact" value="Submit" class="btn wow tada btn-embossed btn-primary pull-right">
				</div>
			</form>
			
			<hr class="featurette-divider hidden-lg">
				<div class="col-md-5 col-md-push-1 address">
					<address>
					<h3>Office Location</h3>
					<p class="lead"><a href="https://www.google.com/maps/place/University+of+Texas+at+Dallas/@32.9843468,-96.7481192,17z/data=!3m1!4b1!4m2!3m1!1s0x864c21ff895e4aa5:0xd9098b32e9aa1331">The SDS<br>
					University of Texas at Dallas</a><br>
					Phone: XXX-XXX-XXXX<br>
					Fax: XXX-XXX-YYYY</p>
					</address>

					<h3>Social</h3>
					<li class="social"> 
					<a href="#"><i class="fa fa-facebook-square fa-size"> </i></a>
					<a href="#"><i class="fa  fa-twitter-square fa-size"> </i> </a> 
					<a href="#"><i class="fa fa-google-plus-square fa-size"> </i></a>
					<a href="#"><i class="fa fa-flickr fa-size"> </i> </a>
					</li>
				</div>
			</div>
		</div>
	</div>
	
	
	
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-7">
            <h3 class="footer-title">Follow Me!</h3>
            <p>Vuoi ricevere news su altri template?<br/>
              Visita Andrea Galanti.it e vedrai tutte le news riguardanti nuovi Theme!<br/>
              Go to: <a  href="http://andreagalanti.it" target="_blank">andreagalanti.it</a>
            </p>
			
			<!-- LICENSE -->
			<a rel="cc:attributionURL" href="http://www.andreagalanti.it/flatfy"
		   property="dc:title">Flatfy Theme </a> by
		   <a rel="dc:creator" href="http://www.andreagalanti.it"
		   property="cc:attributionName">Andrea Galanti</a>
		   is licensed to the public under 
		   <BR>the <a rel="license"
		   href="http://creativecommons.org/licenses/by-nc/3.0/it/deed.it">Creative
		   Commons Attribution 3.0 License - NOT COMMERCIAL</a>.
		   
	   
          </div> <!-- /col-xs-7 -->

          <div class="col-md-5">
            <div class="footer-banner">
              <h3 class="footer-title">Flatfy Theme</h3>
              <ul>
                <li>12 Column Grid Bootstrap</li>
                <li>Form Contact</li>
                <li>Drag Gallery</li>
                <li>Full Responsive</li>
                <li>Lorem Ipsum</li>
              </ul>
              Go to: <a href="http://andreagalanti.it/flatfy" target="_blank">andreagalanti.it/flatfy</a>
            </div>
          </div>
        </div>
      </div>
    </footer>

 
</body>
<script>



</script>
   <!-- JavaScript -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.js"></script>
	<script src="js/owl.carousel.js"></script>
	<script src="js/script.js"></script>
	<!-- StikyMenu -->
	<script src="js/stickUp.min.js"></script>
	<script type="text/javascript">
	  jQuery(function($) {
		$(document).ready( function() {
		  $('.navbar-default').stickUp();
		  
		});
	  });
	
	</script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="js/jquery.corner.js"></script> 
	<script src="js/wow.min.js"></script>
	<script>
	 new WOW().init();
	</script>
	<script src="js/classie.js"></script>
	<script src="js/uiMorphingButton_inflow.js"></script>
	<!-- Magnific Popup core JS file -->
	<script src="js/jquery.magnific-popup.js"></script> 
</html>
