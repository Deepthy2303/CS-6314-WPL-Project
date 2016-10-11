<?php
require_once "lib/nusoap.php";
$client = new nusoap_client("https://localhost/Service/soap/login.php?wsdl", 'wsdl');

//get variables received
$email = $_REQUEST["email1"];
$pass = $_REQUEST["password1"];
$imgurl = $_REQUEST["imgurl"];
$name = $_REQUEST["name"];
$login = $_REQUEST["operation"];	//can be login or signup
if (isset ($_REQUEST["id"]))
	$id = $_REQUEST["id"];	//can be login or signup
else $id = null;

$request_pack = array(
			'email' => $email,
			'pass' => $pass,
			'imgurl' => $imgurl,
			'name' => $name,
			'id' => $id,
			'token'=> 'laskdfjwrofnsadlknjc'
);

$error = $client->getError();

if ($error) {
    echo "<h2>Constructor error</h2><pre>" . $error . "</pre>";
	// At this point, you know the call that follows will fail
    exit();
}

if ($id == null)
	$result = $client->call($login, $request_pack);//use the login service exposed by the server

else 
	$result = $client->call('update', array('id'=>$id, 'name'=> $name, 'token'=>'laskdfjwrofnsadlknjc'));//use the login service exposed by the server

if ($client->fault) 
{
    echo "<h2>Fault</h2><pre>";
    print_r($result);
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
		//check if login success or not 
        //echo "<h2>User</h2><pre>";
		echo json_encode($result);
	
		if ($result['success'] == "login")	//login success
		{
			session_start();
			$_SESSION['user_id'] = $result["id"];
			$_SESSION['user_name'] = $result["name"];        
			$_SESSION['lastlogin'] = $result["lastlogin"];        
			$_SESSION['failedlogin'] = $result["failedlogin"];        
			$_SESSION['imageurl'] = $result["imgurl"];        
			$_SESSION['email'] = $result["email"];        
		}
		//if ($result['success'] == "exist")	//signup failed

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
