<?php
session_start();
    
	//if already logged in
    if(isset($_SESSION['user_id'])){
        header("Location: indexs.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Sign Up Page</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- <link rel="icon" type="image/png" href="assets/img/shopping_cart.png"> -->

    
    <link href="css/bootstrap.min.css" rel="stylesheet" />
  <link href="css/gsdk-base.css" rel="stylesheet" />
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

    <!-- For submission of form using Ajax -->
  <script src="js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="signup.js"></script>

    

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
          <a class="navbar-brand" href="index.php#home">Purchase Books in a Click!</a>
        </div>

        <div class="collapse navbar-collapse navbar-right navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li class="menuItem"><a href="index.php#features">Features</a></li>
            <li class="menuItem"><a href="index.php#categories">Categories</a></li>
            <li class="menuItem"><a href="index.php#useit">New Releases</a></li>
			<li class="menuItem"><a href="index.php#useit">Cart</a></li>
			<li class="menuItem"><a href="#contact">Contact Us</a></li>
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
            <form action="#" method="post" class="form" enctype="multipart/form-data" id="signupForm">
              <!--        You can switch "ct-wizard-azzure"  with one of the next bright colors: "ct-wizard-blue", "ct-wizard-green", "ct-wizard-orange", "ct-wizard-red"             -->

              <div class="wizard-header">
                 <h3> Sign Up !<br>
                    <small>Please enter the foll info...</small>
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
                   <!-- <div class="picture-container">
                    <div class="picture">
                      <img src="assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" title=""/>
                      <input name="uploadedimage" type="file" id="wizard-picture">
                    </div>
                    <h6>Upload an Item Picture</h6>
                </div> -->
            </div>
            <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
              
              <div class="form-group">
                <label>Email : <small>(required)</small></label>
                <input name="email" type="email" id="email" class="form-control" placeholder="Example: xyz@abc.com...">
            </div>
            <div class="form-group">

                <label>Password <small>(required)</small></label>
                <input name="password" type="password" id="password" class="form-control" placeholder="You password here...">
                <!-- <span class="input-group-addon">$</span> -->
                <span id="resultpass" style="color:red;font-style: italic"></span>
            </div>
            <div id="pswd_info">
                <h6>Password must meet the following requirements:</h6>
                <ul>
                    <li id="letter" class="invalid">At least <strong>one letter</strong></li>
                    <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                    <li id="number" class="invalid">At least <strong>one number</strong></li>
                    <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                </ul>
            </div>
            
            
            <div class="form-group">
                <label>First Name : <small>(required)</small></label>
                <input name="fname" type="text" id="fname" class="form-control" placeholder="Example: Harry...">
            </div>
            
            
            
            <div class="form-group">
                <label>Last Name : <small></small></label>
                <input name="lname" type="text" id="lname" class="form-control" placeholder="Example: Potter...">
            </div>
            

            

        </div>

    </div>
</div>


            


  </div>
  <div class="wizard-footer">
     <div class="pull-right">
        <!-- <input type='button' class='btn btn-next btn-fill btn-info btn-wd btn-sm' name='next' value='Next' /> -->
        <input type='button' class='btn btn-finish btn-fill btn-info btn-wd btn-sm' id="signup" name='signup' value='SignUp' />

    </div>
    <div class="pull-left">
    
        <!-- <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Previous' /> -->
    </div>
    <div class="clearfix"></div>
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
<!-- <script src="jquery/jquery-1.10.2.js" type="text/javascript"></script> -->

<!-- <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script> -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>

<!--   plugins   -->
<script src="js/jquery.bootstrap.wizard.js" type="text/javascript"></script>
<!--  More information about jquery.validate here: http://jqueryvalidation.org/  -->
<!-- <script src="assets/js/jquery.validate.min.js"></script> -->
<!--  methods for manipulating the wizard and the validation -->
<script src="js/wizard.js"></script>

</html>