<?php
require_once('lib/nusoap.php'); 
require_once('../db_access/OrdersHandler.php'); 

$server = new nusoap_server;

$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

$server_token = 'laskdfjwrofnsadlknjc';

// ==== WSDL TYPES DECLARATION ==============================================
$server->wsdl->addComplexType(
  'ArrayOfString',
  'complexType',
  'array',
  'sequence',
  '',
  array(
    'itemName' => array(
      'name' => 'itemName', 
      'type' => 'xsd:string',
      'minOccurs' => '0', 
      'maxOccurs' => 'unbounded'
    )
  )
);

// ---- Book ----------------------------------------------------------------
$server->wsdl->addComplexType(
    'Book',
    'complexType',
    'struct',
    'all',
    '',
    array(
        'isbn' => array('name'=>'isbn','type'=>'xsd:string'),
        'title' => array('name'=>'title','type'=>'xsd:string'),
        'author' => array('name'=>'author','type'=>'xsd:string'),
        'cover' => array('name'=>'cover','type'=>'xsd:string'),
        'publisher' => array('name'=>'publisher','type'=>'xsd:string'),
        'pages' => array('name'=>'pages','type'=>'xsd:integer'),
        'price' => array('name'=>'price','type'=>'xsd:float'),
        'reviews' => array('name'=>'reviews','type'=>'tns:ArrayOfString'),
        'description' => array('name'=>'description','type'=>'xsd:string'),
        'rating' => array('name'=>'rating','type'=>'xsd:string'),
        'stock' => array('name'=>'stock','type'=>'xsd:string'),
        'genre' => array('name'=>'genre','type'=>'xsd:string'),
        'id' => array('name'=>'id','type'=>'xsd:integer')
    )
);

// ---- Book[] --------------------------------------------------------------

$server->wsdl->addComplexType(
    'BookArray',
    'complexType',
    'array',
    '',
    'SOAP-ENC:Array',
    array(),
    array(
        array('ref'=>'SOAP-ENC:arrayType','wsdl:arrayType'=>'tns:Book[]')
    ),
    'tns:Book'
);

// ==== WSDL METHODS REGISTRATION ===========================================

$server->register(
    'removeFromCart',
    array(
	'userid'=>'xsd:string', 
	'bookid'=>'xsd:string',
	'token'=>'xsd:string'
	),	
    array('status'=>'xsd:string'),
	'urn:server',   //namespace
	'urn:server#Remove_Cart',  //soapaction
	'rpc', // style
	'encoded', // use
	'remove a book from cart for the user'	//description
	);

$server->register(
    'addToCart',
    array(
	'userid'=>'xsd:string', 
	'bookid'=>'xsd:string',
'token'=>'xsd:string'	
	),	
    array('status'=>'xsd:string'),
	'urn:server',   //namespace
	'urn:server#Add_Cart',  //soapaction
	'rpc', // style
	'encoded', // use
	'add a book to cart for the user'	//description
	);
	
$server->register(
    'addReview',
    array(
	'userid'=>'xsd:string', 
	'bookid'=>'xsd:string',	
	'review'=>'xsd:string',
	'token'=>'xsd:string'
	),	
    array('status'=>'xsd:string'),
	'urn:server',   //namespace
	'urn:server#Add_Review',  //soapaction
	'rpc', // style
	'encoded', // use
	'add a book to cart for the user'	//description
	);
	
$server->register(
    'checkout',
    array(
	'userid'=>'xsd:integer',
	'token'=>'xsd:string'
	),
    array('status'=>'xsd:string'),
    'urn:server',   //namespace
	'urn:server#Checkout',  //soapaction
	'rpc', // style
	'encoded', // use
	'checkout all the books in the users cart'	//description
	);

$server->register(
    'getCart',
    array(
	'userid'=>'xsd:integer',
	'token'=>'xsd:string'
	),
    array('return'=>'tns:BookArray'),
    'urn:server',   //namespace
	'urn:server#Get_Cart',  //soapaction
	'rpc', // style
	'encoded', // use
	'retrun all the books in the users cart'	//description
	);

$server->register(
    'getReview',
    array(
	'userid'=>'xsd:integer',
	'bookid'=>'xsd:integer',
	'token'=>'xsd:string'
	),
    array('return'=>'tns:ArrayOfString'),
    'urn:server',   //namespace
	'urn:server#Get_Cart',  //soapaction
	'rpc', // style
	'encoded', // use
	'retrun all the books in the users cart'	//description
	);
	
$server->register(
    'getOrders',
    array(
	'userid'=>'xsd:integer',
	'token'=>'xsd:string'
	),
    array('return'=>'tns:BookArray'),
    'urn:server',   //namespace
	'urn:server#Get_Orders',  //soapaction
	'rpc', // style
	'encoded', // use
	'get an array of all books bought by the user'	//description
	);


// ==== METHOD IMPLEMENTATION ===============================================

// ---- getOrders(user) : Books[] ----------------------------------------------------
function getOrders($userid, $token) 
{	
$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}

	$order = new OrdersHandler();
	$ret = array();
    $ret = $order->getOrders($userid);
	//print_r($ret);
	
   return $ret;
}

// ---- checkout(user) ----------------------------------------------------
function checkout($userid, $token) 
{	
$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}

	$order = new OrdersHandler();
	
    $ret = $order->checkout($userid);
	//print_r($ret);
	
   return $ret;
}


// ---- addToCart(user , book) ----------------------------------------------------
function addToCart($userid, $bookid, $token) 
{	
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}

	$order = new OrdersHandler();
	
    $ret = $order->addToCart($userid, $bookid);
	//print_r($ret);
	
   return $ret;
}

// ---- addToCart(user , book) ----------------------------------------------------
function addReview($userid, $bookid, $review, $token) 
{	
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}

	$order = new OrdersHandler();
	
    $ret = $order->addReviews($userid, $bookid, $review);
	//print_r($ret);
	
   return $ret;
}

// ---- removeFromCart(user , book) ----------------------------------------------------
function removeFromCart($userid, $bookid, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	$order = new OrdersHandler();
	
    $ret = $order->removeFromCart($userid, $bookid);
	//print_r($ret);
    return $ret;
}

// ---- getCart(user) ----------------------------------------------------
function getCart($userid, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	$order = new OrdersHandler();
	
    $book = $order->getCart($userid);
	//print_r($ret);
    return $book;
}

// ---- getCart(user) ----------------------------------------------------
function getReview($userid, $bookid, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}

	$order = new OrdersHandler();
	
    $book = $order->getReview($userid, $bookid);
	//print_r($ret);
    return $book;
}

// ==== PROCESS REQUEST =====================================================
$rawPostData = file_get_contents("php://input");
$server->service($rawPostData);

