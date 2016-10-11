<?php
require_once "lib/nusoap.php";
$client = new nusoap_client("https://localhost/Service/soap/getBooks.php?wsdl", 'wsdl');

//get variables received
//get books that match query this with col name
$get_col = $_REQUEST["column"];
$target = $_REQUEST[$get_col];

//print_r($_REQUEST);

if (isset($_REQUEST['page']))
	$operation = 'search';
else 
	$operation = null;

$error = $client->getError();

if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	// At this point, you know the call that follows will fail
    exit();
}
//echo "col " .$get_col. " ".PHP_EOL;
//echo "val" .$target. " ".PHP_EOL;

if ($operation == null)
	$book = $client->call("getByColumn", array('column'=>$get_col, 'col_val'=>$target, 'token' => 'laskdfjwrofnsadlknjc')); //get book by title
else 
	$book = $client->call("search", array('text'=>$_REQUEST['page'])); //get book by title

if ($client->fault) 
{
    echo "<h2>Fault</h2><pre>";
    print_r($book);
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
		//echo "success".PHP_EOL;
		//check if login success or not 
        //echo "<h2>User</h2><pre>";
		//print_r ($book);
		//print_r ($book);
		//echo json_encode($books, JSON_PRETTY_PRINT); 
		
		echo json_encode($book); 
		//echo json_encode($book);		
        //echo "</pre>";
    }
}

		ob_start();
		echo PHP_EOL;
		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
		echo $date;
		echo PHP_EOL;
		echo "<h2>Request</h2>";
		echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
		echo "<h2>Response</h2>";
		echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";

		$output = ob_get_clean();
		
		$filehandle = fopen("c:\\wamp\\www\\service\\service_logger.txt", "a");


			fwrite($filehandle, $output);
			fclose($filehandle);			

//echo "<h2>Request</h2>";
//echo "<pre>" . htmlspecialchars($client->request, ENT_QUOTES) . "</pre>";
//echo "<h2>Response</h2>";
//echo "<pre>" . htmlspecialchars($client->response, ENT_QUOTES) . "</pre>";
