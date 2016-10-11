<?php
session_start();
//echo $_GET['id'];
$url = 'http://localhost/client_service/booksHandler.php';
$data = array('id' => $_GET['id'], 'column' => 'id');

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { echo "error";/* Handle error */ }
//print_r($result);
$book = json_decode($result, true);
//print_r($book);
//echo " " .PHP_EOL;
//echo $book[0]['isbn'];
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
	<br />
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
					<div class="left-sidebar">
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="bestsellers.php">
											
											Bestsellers
										</a>
									</h4>
								</div>
							</div>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="academic.php">
											
											Academic & Professional
										</a>
									</h4>
								</div>
							</div>
							
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title">
										<a data-toggle="collapse" data-parent="#accordian" href="literature.php">
											
											Literature & Fiction
										</a>
									</h4>
								</div>
							</div>
						</div><!--/category-products-->
					
						
						
						
					</div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo $book[0]['cover']; ?>" alt="" />
								
							</div>
							
							

						</div>
						
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<h2><?php echo $book[0]['title']; ?></h2>
								<span>
									<span>$ <?php echo $book[0]['price']; ?></span>
									<button type="button" class="btn btn-fefault cart" id="cart">
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> <?php if( $book[0]['stock'] > 0) echo 'In Stock'; else echo 'Not Availabile'; ?></p>
								<p><b>Reviews:</b> <div id="review_display"></div>
								</p>
								</div><!--/product-information-->
						</div>
					</div><!--/product-details-->	
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								
								<li class="active"><a href="#reviews" data-toggle="tab">Reviews</a></li>
							</ul>
						</div>
						<div class="tab-content">
							
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<p></p>
									<p><b>Write Your Review!</b></p>
									<p id="userid" style="display:none;"> <?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0;?> </p>
									<p id="bookid" style="display:none;"> <?php echo $_GET['id']; ?> </p>
									<form action="#">
										<textarea name="review" id="book_review" ></textarea>

										<button id="submit_review" type="button" class="btn btn-default pull-right">
											Submit
										</button>
									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
					
					
					
				</div>
			</div>
		</div>
		<div class="common-modal modal fade" id="common-Modal1" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-content">
				<ul class="list-inline item-details">
					<li><a href="http://themifycloud.com">Ecommerce templates</a></li>
					<li><a href="http://themescloud.org">Ecommerce themes</a></li>
				</ul>
			</div>
		</div>
	</section>
	
	
	
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>

<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
<script> 
$(document).ready(function()
{
	var userid1 = <?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0;?>;
	var bookid1 =  <?php echo $_GET['id']; ?>;	
	if (userid1 == 0)
	{
		alert("Please Login first");
		window.location = 'https://localhost/site/indexs.php';
	}
	//alert(userid1);
	//alert(bookid1);
  $.post
  (
  "https://localhost/client_service/ordersHandler.php", 
  {
  userid:userid1,
  bookid: bookid1,
  operation:'getReview'
  },
  function(data)
  {	
	console.log(data);
	var response = JSON.parse(data);
	for (var key=0, size=response.length; key<size;key++) {
		$('<div>')
		.append($('<p>').html(response[key]
		)).appendTo('#review_display');
		
	}
//	if (data == "added")
//	{
		//alert("book added to cart");
		//window.location = 'https://localhost/site/indexs.php';
//	}
//		alert("boo not added to cart");
 
  });	
	
	$("#cart").click(function(){

	var userid1 = <?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0;?>;
	var bookid1 =  <?php echo $_GET['id']; ?>;	
	if (userid1 == 0)
	{
		alert("Please Login first");
		window.location = 'https://localhost/site/indexs.php';
	}
	//alert(userid1);
	//alert(bookid1);
  $.post
  (
  "https://localhost/client_service/ordersHandler.php", 
  {
  userid:userid1,
  bookid: bookid1,
  operation:'addToCart'
  },
  function(data)
  {	
	console.log(data);
//	if (data == "added")
//	{
		alert("book added to cart");
		window.location = 'https://localhost/site/indexs.php';
//	}
//		alert("boo not added to cart");
 
  });
});


	$("#submit_review").click(function(){
		alert("got review");

	var userid1 = <?php if(isset($_SESSION['user_id'])) echo $_SESSION['user_id']; else echo 0;?>;
	var bookid1 =  <?php echo $_GET['id']; ?>;	
	var review1 = document.getElementById("book_review").value;	
	//alert(review1);
	if (userid1 == null)
	{
		alert("Please Login first");
		window.location = 'https://localhost/site/login.php';
	}
	//alert(userid1);
	//alert(bookid1);
  $.post
  (
  "https://localhost/client_service/ordersHandler.php", 
  {
  userid:userid1,
  bookid: bookid1,
  review:review1,
  operation:'addReview'
  },
  function(data)
  {	
	console.log(data);
//	if (data == "added")
//	{
		//alert("book added to cart");
		window.location.reload();
//	}
//		alert("boo not added to cart");
 
  });
});		
});
</script>
</html>