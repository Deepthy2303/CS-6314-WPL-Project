<?php
require_once "lib/nusoap.php";
$client = new nusoap_client("https://localhost/Service/soap/orders.php?wsdl", 'wsdl');

//get variables received
//get books that match query this with col name
$userid = $_REQUEST["userid"];
$bookid = $_REQUEST["bookid"];
if (isset ($_REQUEST["review"]))
{
	$review = $_REQUEST["review"];
}
else 
{
	$review = null;
}

$operation = $_REQUEST['operation'];
//print_r($_REQUEST);

$error = $client->getError();

if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	// At this point, you know the call that follows will fail
    exit();
}
//echo "col " .$get_col. " ".PHP_EOL;
//echo "val" .$target. " ".PHP_EOL;
if ($review == null)
$ret = $client->call($operation, array('userid'=>$userid, 'bookid'=>$bookid)); //get book by title

else 
	$ret = $client->call('addReview', array('userid'=>$userid, 'bookid'=>$bookid, 'review'=>$review, 'token' => 'laskdfjwrofnsadlknjc')); //get book by title


if ($client->fault) 
{
    echo "<h2>Fault</h2><pre>";
    //print_r($ret);
    echo "</pre>";
}
else 
{
    $error = $client->getError();
    if ($error) 
	{
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else 
	{
		//print_r($ret);
		//echo "success".PHP_EOL;
		//check if login success or not 
        //echo "<h2>User</h2><pre>";
		//print_r ($book);
		//print_r ($book);
		//echo json_encode($books, JSON_PRETTY_PRINT); 
//		if ($review == null)
		echo json_encode($ret); 
//		else 
//		{
//		array(
//		'book'=>json_encode($ret),/
//		'review'=>$
//		);
	
//			return $ret;
//		}
		
        //echo "</pre>";
    }
}

		ob_start();
		echo PHP_EOL;
		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
		echo "log local date time ---> ".$date;
		echo PHP_EOL;
		echo "<h2>Request</h2>";
		echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
		echo "<h2>Response</h2>";
		echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

		//$output = ob_get_clean();
		$output = ob_get_contents();
		
		$filehandle = fopen("c:\\wamp\\www\\service\\service_logger.txt", "a");


			fwrite($filehandle, $output);
			fclose($filehandle);
		ob_end_clean();
		
//echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
//echo "<h2>Response</h2>";
//echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
