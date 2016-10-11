<?php
$memcache = new Memcache();
//var_dump($mem);
$memcache->connect('localhost', 11211);
print_r($memcache);
//$memcache = memcache_connect('localhost', 11211);
var_dump($memcache->getStats());

if ($memcache) {
	$memcache->set("str_key", "String to store in memcached");
	$memcache->set("num_key", 123);

	$object = new StdClass;
	$object->attribute = 'test';
	$memcache->set("obj_key", $object);

	$array = Array('assoc'=>123, 345, 567);
	$memcache->set("arr_key", $array);

	var_dump($memcache->get('str_key'));
	var_dump($memcache->get('num_key'));
	var_dump($memcache->get('obj_key'));
}
else {
	echo "Connection to memcached failed";
}
?>

