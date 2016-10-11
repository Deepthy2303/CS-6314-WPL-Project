<?php
require_once('lib/nusoap.php'); 
require_once('../db_access/BookHandler.php'); 

$server = new nusoap_server;

$server->configureWSDL('server', 'urn:server');

$server->wsdl->schemaTargetNamespace = 'urn:server';

$server_token = 'laskdfjwrofnsadlknjc';

// ==== WSDL TYPES DECLARATION ==============================================

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
        'reviews' => array('name'=>'reviews','type'=>'xsd:string'),
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
    'getBook',
    array(
	'title'=>'xsd:string',
	'token'=>'xsd:string'	
	),
    array('return'=>'tns:Book'),
	'urn:server',   //namespace
	'urn:server#Book',  //soapaction
	'rpc', // style
	'encoded', // use
	'get a single book object by title'	//description
	);

$server->register(
    'getByColumn',
    array(
	'column'=>'xsd:string', 
	'col_val'=>'xsd:string',
	'token'=>'xsd:string'	
	),
    array('return'=>'tns:BookArray'),
	'urn:server',   //namespace
	'urn:server#Book',  //soapaction
	'rpc', // style
	'encoded', // use
	'get a single book object by column'	//description
	);	

$server->register(
    'search',
    array(
	'text'=>'xsd:string',
	'token'=>'xsd:string'
	),
    array('return'=>'tns:BookArray'),
	'urn:server',   //namespace
	'urn:server#Book',  //soapaction
	'rpc', // style
	'encoded', // use
	'get a single book object by column'	//description
	);	
	
$server->register(
    'getBooks',
    array(
	'genre'=>'xsd:string',
	'token'=>'xsd:string'
	),
    array('return'=>'tns:BookArray'),
    'urn:server',   //namespace
	'urn:server#Books',  //soapaction
	'rpc', // style
	'encoded', // use
	'get an array of books'	//description
	);


// ==== METHOD IMPLEMENTATION ===============================================

// ---- getBook(title) ------------------------------------------------------

function getBook($title, $token) 
{
$server_token = 'laskdfjwrofnsadlknjc';
	
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	$bk = new Book_handler();
	$book = $bk->getByTitle($title);
	if ($book == null)
	{
				$ret = array(
				'isbn'=>'',
				'title'=>'',
				'author'=>'',
				'cover'=>'',
				'publisher'=>'',
				'pages'=>'',
				'price'=>'',
				'reviews'=>'',
				'description'=>'',
				'rating'=>'',
				'stock'=>'',
				'genre'=>'',
				'id'=>0	//indicates that book is null
				);	
		return $ret;				
	}

    return $book;
}

// ---- getBooks(author) ----------------------------------------------------

function getBooks($genre, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	$bk = new BookHandler();
	// Generate a book[]
    $book = $bk->getByGenre($genre);
	
   return $book;
}

function getByColumn($column, $col_val, $token) 
{
	$server_token = 'laskdfjwrofnsadlknjc';
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	//echo $col_val ." ".PHP_EOL;
	//echo $column ." ".PHP_EOL;
	
	$bk = new BookHandler();
	// Generate a book[]
    $book = $bk->getByColumn($column, $col_val);
	//print_r($book);
	
   return $book;
}

function search($text, $token) 
{
$server_token = 'laskdfjwrofnsadlknjc';	
	if ($token != $server_token)
	{
		return array('status'=>'bad_token');
	}
	
	//echo $col_val ." ".PHP_EOL;
	//echo $column ." ".PHP_EOL;
	
	$bk = new BookHandler();
	// Generate a book[]
    $book1 = $bk->getByColumn('author', $text);
    //$book2 = $bk->getByColumn('title', $text);
	//$book = array_merge($book1, $book2);
	//print_r($book2);
	
   return $book1;
}


//$this->nusoap_server->service(file_get_contents("php://input"));
// ==== PROCESS REQUEST =====================================================
$rawPostData = file_get_contents("php://input");
$server->service($rawPostData);

