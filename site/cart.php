 <?php
	session_start();
	if(!isset($_SESSION['user_id']))
	{
		header("Location: login.php");
	}		
	//echo $_SESSION['user_name'];
	
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
	
	<section id="cart_items">
		<div class="container">
		<br/>
		<br/>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
				   <col span="1" style="width: 15%;">
				   <col span="1" style="width: 55%;">
				   <col span="1" style="width: 10%;">
					<col span="1" style="width: 20%;">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description">Description</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td></td>
						</tr>
					</thead>
					<tbody id="cart_table">
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area" style="display:none;">
						<ul class="user_option">
							<li>
								<input type="checkbox">
								<label>Use Coupon Code</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Use Gift Voucher</label>
							</li>
							<li>
								<input type="checkbox">
								<label>Estimate Shipping & Taxes</label>
							</li>
						</ul>
						<ul class="user_info">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>United States</option>
									<option>Bangladesh</option>
									<option>UK</option>
									<option>India</option>
									<option>Pakistan</option>
									<option>Ucrane</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
								
							</li>
							<li class="single_field">
								<label>Region / State:</label>
								<select>
									<option>Select</option>
									<option>Dhaka</option>
									<option>London</option>
									<option>Dillih</option>
									<option>Lahore</option>
									<option>Alaska</option>
									<option>Canada</option>
									<option>Dubai</option>
								</select>
							
							</li>
							<li class="single_field zip-field">
								<label>Zip Code:</label>
								<input type="text">
							</li>
						</ul>
						<a class="btn btn-default update" href="">Get Quotes</a>
						<a class="btn btn-default check_out" href="">Continue</a>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span id="total_cart">$0</span></li>
							<li>Eco Tax <span id="tax_cart">$0</span></li>
							<li>Shipping Cost <span id="ship_cart">$0</span></li>
							<li>Total <span id="final_cart">$0</span></li>
						</ul>
							<a class="btn btn-default update" href='javascript:;' onclick='alert("update")';>Update</a>
							<a class="btn btn-default check_out" href='javascript:;' onclick='checkout()'>Check Out</a>
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->

	


</body>
    <script src="js1/jquery.js"></script>
	<script src="js1/bootstrap.min.js"></script>
	<script src="js1/jquery.scrollUp.min.js"></script>
    <script src="js1/jquery.prettyPhoto.js"></script>
    <script src="js1/main.js"></script>
    <script>
	var response;
	var key = 0;
	var price = 0;
		var tax = 0;
		var ship_cost = 0;
		var final_cart = 0;	
	function addToCart(bookid)	//add the book id to user cart db
	{
		$.post
		  (
		  "https://localhost/client_service/ordersHandler.php", 
		  {
			  userid:'<?php echo $_SESSION['user_id'];?>',
			  bookid:bookid,
			  operation:'addToCart'
		  },
		  function(data)
		  {
			console.log("start");
			console.log(data);	
			
			//response = JSON.parse(data);
			
			//console.log(response.length);
			//price = 0;
			alert("updating cart...");
			window.location = 'https://localhost/site/cart.php';	
			});			
	}
	
	function removeFromCart(bookid)	//add the book id to user cart db
	{
		console.log(bookid);
		
		$.post
		  (
		  "https://localhost/client_service/ordersHandler.php", 
		  {
			  userid:'<?php echo $_SESSION['user_id'];?>',
			  bookid:bookid,
			  operation:'removeFromCart'
		  },
		  function(data)
		  {
			console.log("start");
			console.log(data);	
			
			//response = JSON.parse(data);
			
			//console.log(response.length);
			//price = 0;
			alert("updating cart...");
			window.location = 'https://localhost/site/cart.php';	
			});			
	}
	

		function add_cart(up_down, e, resp)
		{
			//alert(""+e);
			var val = document.getElementById("qty"+e).value;
			//console.log(val);
			//alert("dir is " + up_down + val);
			var count = Number(val);
			
			if (up_down == 'up')
			{
				count += 1;
				addToCart(resp);	//add the book id to user cart db
			}
			else if (count >= 1){
					count -= 1;
					removeFromCart(resp);	//remove the book id from user cart db
			}

			document.getElementById("qty"+e).value = count.toString();
		}
	function checkout()
	{
		$.post
		  (
		  "https://localhost/client_service/ordersHandler.php", 
		  {
			  userid:<?php echo $_SESSION['user_id'];?>,
			  bookid:null,
			  operation:'checkout'
		  },
		  function(data)
		  {
			console.log("start");
			console.log(data);	
			
			//response = JSON.parse(data);
			
			//console.log(response.length);
			//price = 0;
			alert("Thanks for shopping with us... you will shortly revceive an email with a list of items bought");
			window.location = 'https://localhost/site/indexs.php';	
			});	
			
			
	}	//END CHEKCOUT()
	
$(document).ready(function()
{
  $.post
  (
  "https://localhost/client_service/ordersHandler.php", 
  {
  userid:<?php echo $_SESSION['user_id'];?>,
  bookid:null,
  operation:'getCart'
  },
  function(data)
  {
	console.log("start");
	console.log(data);	
	
	response = JSON.parse(data);
	
	console.log(response.length);
	price = 0;
	
	for (var key=0, size=response.length; key<size;key++) {
	
	price += response[key].price;
	$('<tr>')
		
		.append( $('<td class="cart_product">').html(
		"<a href=https://localhost/site/products.php?id=" + response[key].id + "> <img src=https://localhost/service/img/prod_" + response[key].id + ".jpg </a>"
		))
		.append($('<td class="cart_description">').html(
		"<h4>"+response[key].title+"</h4> <p> " + response[key].author+" </p>"
		))
		.append( $('<td class="cart_price">').html("<p> $" + response[key].price+" </p>"
		
		))
		.append( $('<td class="cart_quantity">').html("<div class=\"cart_quantity_button\"> <a class=\"cart_quantity_up\" href=\"javascript:;\" onclick=\"add_cart('up'," + key+", "+response[key].id + ")\"> + </a> <input class=\"cart_quantity_input\" type=\"text\" value=1 autocomplete=\"off\" size=\"2\" id=\"qty" + key+"\">	<a class=\"cart_quantity_down\" href=\"javascript:;\" onclick=\"add_cart('down'," + key+","+response[key].id + ")\"> - </a></div>"
		
		))	
		.appendTo('#cart_table');
		}
		 tax = (price*8.25/100);
		ship_cost = (price*1.25/100);
		 final_cart = (tax + price + ship_cost);
		$("#total_cart").html('$' + price.toFixed(2));
		$("#tax_cart").html('$' + tax.toFixed(2));
		$("#ship_cart").html('$' + ship_cost.toFixed(2));
		$("#final_cart").html('$' + final_cart.toFixed(2));
});
	
});	
	</script>
	<script>
	
	
	
	</script>
	
	


</html>