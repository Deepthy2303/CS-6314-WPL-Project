<?php
session_start();
    // include('search_script.php'); // Includes Search Script

//    if(isset($_SESSION['user_id'] > 0)){
//        header("Location: indexs.php");

//    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Profile Settings</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- <link rel="icon" type="image/png" href="assets/img/shopping_cart.png"> -->

    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/gsdk-base.css" rel="stylesheet" />
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- For submission of form using Ajax -->
  <script src="js/jquery-2.1.4.min.js"></script>
  <script src="js/jquery-1.10.2.js" type="text/javascript"></script>
    

<style type="text/css">
    div{
        floar:right;
    }

    #pswd_info {
        position:absolute;

        background:#fefefe;
        font-size:.875em;
        border-radius:5px;
        box-shadow:0 1px 3px #ccc;
        border:1px solid #ddd;
        clear: both;
        list-style-type:none;
    }

    #pswd_info h4 {
        /*margin:0 0 10px 0;*/
        padding:0;
        font-weight:normal;
    }

    #pswd_info::before {
        content: "\25B2";


        font-size:14px;
        line-height:14px;
        color:#ddd;
        text-shadow:none;
        display:block;
    }

    .invalid {
        background:url(img/cancel.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#ec3f41;
    }
    .valid {
        background:url(img/accept.png) no-repeat 0 50%;
        padding-left:22px;
        line-height:24px;
        color:#3a7d34;

    }

    #pswd_info {
    display:none;
}

</style>
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
          <a class="navbar-brand" href="indexs.php#home">Purchase Books in a Click!</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="menuItem"><a href="indexs.php#features">Features</a></li>
            <li class="menuItem"><a href="indexs.php#categories">Categories</a></li>
            <li class="menuItem"><a href="new.php">New Releases</a></li>
			<li class="menuItem"><a href="cart.php">Cart</a></li>
			<li class="menuItem"><a href="indexs.php#contact">Contact Us</a></li>
          </ul>
        </div>

      </div>
    </nav> 
    
<div class="image-container set-full-height" style="background-image: url('img/intro/intro4.jpg')">

<!--   Big container   -->
<div class="container">
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">

        <!--      Wizard container        -->   
        <div class="wizard-container">
          <div class="card wizard-card ct-wizard-azzure" id="wizard">
             <form action="#" method="get" class="form" enctype="multipart/form-data" id="search"> 
			
              <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

              <div class="wizard-header">
                 <h3> View / Update your profile !<br>
                    
                </h3>
            </div>
            <ul>
              <li><a href="#details" data-toggle="tab">Details</a></li>
              <!-- <li><a href="#categ" data-toggle="tab">Item Category</a></li> -->
              <!-- <li><a href="#description" data-toggle="tab">Description</a></li> -->
          </ul>

          <div class="tab-content">
              <div class="tab-pane" id="details">
                <div class="row">

                   <h4 class="info-text" id="error"></h4>
                   <div class="col-sm-4 col-sm-offset-1">
                   
            </div>
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
              
              <div class="form-group">
                
                <input type="text" id="text" class="form-control" value="<?php echo $_SESSION['user_name']?>" required>
				
                <input type="text" class="form-control" value="Email:<?php echo $_SESSION['email']?>" readonly>
                <input type="text" class="form-control" value="Last Login Time:<?php echo $_SESSION['lastlogin']?>" readonly>
                <input type="text" class="form-control" value="Number of failed Logins:<?php
				if ($_SESSION['failedlogin'] == null)
					echo 0;
				else echo $_SESSION['failedlogin'];
				
				?>" readonly>
				
				
            </div>
            <div class="wizard-footer">
     <div class="pull-right">
        <!-- <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' /> -->
        <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' id="user_name" name='user_name' value='Update Name' />

    </div>
    <div class="pull-left">
    
        <!-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' /> -->
    </div>
    <div class="clearfix"></div>

    </div>
</div>
       


  </div>
   
</form>
</div>
</div> <!-- wizard container -->
</div>
</div> <!-- row -->
</div> <!--  big container -->

<div class="footer">
  <!-- <div class="container">
   Made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>. Free download <a href="http://www.creative-tim.com/product/bootstrap-wizard">here.</a>
</div> -->
</div>
</div>
</body>

<style>
video#bgvid { 
    position: fixed;
    top: 50%;
    left: 50%;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -100;
    -ms-transform: translateX(-50%) translateY(-50%);
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
    background: url(video/snap.png) no-repeat;
    background-size: cover; 
}
</style>
<!-- <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script> -->

<!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--   plugins   -->
<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
<!--  methods for manipulating the wizard and the validation -->
<script src="js/wizard.js"></script>

<script>
$(document).ready(function()
{ 
var action_php = "https://localhost/client_service/loginHandler.php";
console.log("start");
$("#user_name").click(function(){
	console.log("btn clicksd");
	var src_text = $("#text").val();
	console.log(src_text);
	
			$.post(action_php,{ email1: "", password1:"", name:src_text, imgurl:null, id:'<?php echo $_SESSION['user_id']; ?>', operation:'update'},
				function(data) {
					//console.log(data);
					var response = JSON.parse(data);
					//alert(response["id"]);
					alert("name updated");
					window.location = 'https://localhost/site/profile.php';
				});
	
	
});
});
</script>
</html>
</html>