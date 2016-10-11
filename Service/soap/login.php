<?php
require_once('lib/nusoap.php'); 
require_once('../db_access/userHandler.php'); 

$server = new nusoap_server;

$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

$server_token = 'laskdfjwrofnsadlknjc';

//SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
    'User',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'id' => array('name' => 'id', 'type' => 'xsd:int'),
        'name' => array('name' => 'name', 'type' => 'xsd:string'),
        'email' => array('name' => 'email', 'type' => 'xsd:string'),
        'lastlogin' => array('name' => 'lastlogin', 'type' => 'xsd:string'),
        'failedlogin' => array('name' => 'failedlogin', 'type' => 'xsd:int'),
        'imgurl' => array('name' => 'imgurl', 'type' => 'xsd:string'),
		'success' => array('name' => 'success', 'type' => 'xsd:string')	
		//pass - wrong pass
		//fail - no user found		
    )
);

//this is the second webservice entry point/function 
$server->register(
			'login',
			array(	//parameters
			'email' => 'xsd:string', 
			'pass'=>'xsd:string',
			'imgurl'=>'xsd:string',
			'name'=>'xsd:string',
			'token'=>'xsd:string'
			),			
			array('return' => 'tns:User'),  //output
			'urn:server',   //namespace
			'urn:server#loginServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Check user login'	//description
			);  

//this is the second webservice entry point/function 
$server->register(
			'update',
			array(	//parameters
			'id'=>'xsd:integer',
			'name'=>'xsd:string',
			'token'=>'xsd:string'
			),			
			array('return' => 'tns:User'),  //output
			'urn:server',   //namespace
			'urn:server#loginServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'update user'	//description
			); 			
			
//this is the second webservice entry point/function 
$server->register(
			'signup',
			array(	//parameters
			'email' => 'xsd:string', 
			'pass'=>'xsd:string',
			'imgurl'=>'xsd:string',
			'name'=>'xsd:string',
			'token'=>'xsd:string'
			),			
			array('return' => 'tns:User'),  //output
			'urn:server',   //namespace
			'urn:server#loginServer',  //soapaction
			'rpc', // style
			'encoded', // use
			'Check user login'	//description
			);  

//implementation of service
function update($id, $name, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>'bad_token'
			);		
	}
        //object for accessing database 
		$h = new UserHandler();
		$ret = $h->update($id, $name);

			return array
			(
			'id'=>$ret['id'],
			'name'=>$ret['name'],
			'email'=>$ret['email'],
			'lastlogin'=>$ret['lastlogin'],
			'failedlogin'=>$ret['failedlogin'],
			'imgurl'=>$ret['imageurl'],
			'success'=>'login'	
			);	
}

			
//implementation of service
function login($email, $pass, $imgurl, $name, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>'bad_token'
			);		
	}
        //object for accessing database 
		$h = new UserHandler();
		$ret = $h->exist($email, $pass, $imgurl, $name);
		//print_r($ret);
		
		if($ret == "pass")	//wrong password-- just some dummy result
        {
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>$ret			
			);
		}
		if ($ret == null)
		{
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>'fail'
			);			
		}
		else	//found the user or google signup
		{
			return array
			(
			'id'=>$ret['id'],
			'name'=>$ret['name'],
			'email'=>$ret['email'],
			'lastlogin'=>$ret['lastlogin'],
			'failedlogin'=>$ret['failedlogin'],
			'imgurl'=>$ret['imageurl'],
			'success'=>'login'	
			);			
		}		
}

//implementation of service
function signup($email, $pass, $imgurl, $name, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>'bad_token'
			);
	}
        //object for accessing database 
		$h = new UserHandler();
		$ret = $h->create_user($email, $pass, null, $name);
		//print_r($ret);
		
		if($ret == "exist")	//email already in db
        {
			return array
			(
			'id'=>0,
			'name'=>'',
			'email'=>'',
			'lastlogin'=>0,
			'failedlogin'=>0,
			'imgurl'=>'',
			'success'=>$ret			
			);
		}
		
		//user added to db		
		return array
		(
		'id'=>$ret['id'],
		'name'=>$ret['name'],
		'email'=>$ret['email'],
		'lastlogin'=>$ret['lastlogin'],
		'failedlogin'=>$ret['failedlogin'],
		'imgurl'=>$ret['imageurl'],
		'success'=>'login'	
		);				
}

$rawPostData = file_get_contents("php://input");
$server->service($rawPostData);
