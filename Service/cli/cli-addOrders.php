<?php
// cli-addOrders.php
require_once "../db_access/OrdersHandler.php";

$order = new OrdersHandler();
$userid = $argv[1];
//$bookid = $argv[2];

//$ret = $order->addToCart($userid, $bookid);
$ret = $order->getOrders($userid);

print_r($ret);
//echo "Created User with ID " . $ret[0]['title'] . "\n";