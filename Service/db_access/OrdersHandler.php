<?php
// user_handler.php
require_once "../bootstrap.php";
require_once "BookHandler.php";

//users and login and signup
class OrdersHandler
{
	public function addToCart($userid, $bookid)
	{
		global $entityManager;
		//add book to orders table and mark incomplete flag
		$order = new Orders;
		$order->setUserid($userid);
		$order->setBookid($bookid);
		$order->setStatus("incomplete");	//not yet checked out

		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
			
		$order->setTime_stamp($date);
		
		$entityManager->persist($order);
		$entityManager->flush();		
		return "added";		
	}

	public function removeFromCart($userid, $bookid)
	{
		global $entityManager;
		//mark status as invalid for user with book with status incomplete
		
		$orders = $entityManager->getRepository('Orders')->findBy(array('userid' => $userid));
		

		foreach ($orders as $order)
		{
			if ($order->getBookid() == $bookid)
			{
				if ($order->getStatus() == "incomplete")
				{
					$order->setStatus("invalid");
					$entityManager->persist($order);
					$entityManager->flush();		
					return "removed";	//return on first find
				}
			}
		}
		return "not found";
	}
	
	//mark all orders as complete
	public function checkout($userid)	
	{
		global $entityManager;
		
		$orders = $entityManager->getRepository('Orders')->findBy(array('userid' => $userid));
		
		$user = $entityManager->find('User', $userid);
		foreach ($orders as $order)
		{
			if ($order->getStatus() == "incomplete")
			{
				$order->setStatus("complete");		
			}
		}
		
		$emailTo = "srikanth90.krish@gmail.com";
		//$emailTo = $user->getEmail();
		
		$command = "powershell C:\\wamp\\www\\Service\\soap\\email.ps1 ".$emailTo;
		
		exec($command,$output);
		
		$entityManager->persist($order);
		$entityManager->flush();		
		return "checked";
		
	}

	//return all incomplete orders --> in cart items
	public function getCart($userid)	
	{
		global $entityManager;
		$book = new BookHandler();
		$orders = $entityManager->getRepository('Orders')->findBy(array('userid' => $userid));
		
		$ret = array();
		$i = 0;
		foreach ($orders as $order)
		{
			if ($order->getStatus() == "incomplete")
			{
				//echo $order->getBookid(). "  ";
				$bk = $book->getById($order->getBookid());
				$ret[$i++] = $bk;
			}
		}
		if ($i == 0)	//cart is empty
			return null;
		//print_r($ret);
		return $ret;	
	}

	//return all complete orders --> in cart items
	public function getOrders($userid)	
	{
		global $entityManager;
		$book = new BookHandler();
		$orders = $entityManager->getRepository('Orders')->findBy(array('userid' => $userid));
		
		$ret = array();
		$i = 0;
		foreach ($orders as $order)
		{
			if ($order->getStatus() == "complete")
			{
				//echo $order->getBookid(). "  ";
				$bk = $book->getById($order->getBookid());
				$ret[$i++] = $bk;
			}
		}
		if ($i == 0)	//cart is empty
			return null;
		//print_r($ret);
		return $ret;	
	}

	public function addReviews($userid, $bookid, $review)
	{
		global $entityManager;
		//add book to orders table and mark incomplete flag
		$order = new Orders;
		$order->setUserid($userid);
		$order->setBookid($bookid);
		$order->setReviews($review);
		
		$order->setStatus("invalid");	//not yet checked out

		date_default_timezone_set('America/Chicago');
		$date = date('m/d/Y h:i:s a', time());	
			
		$order->setTime_stamp($date);
		
		$entityManager->persist($order);
		$entityManager->flush();		
		return "added";		
	}	
	
	public function getReview($userid, $bookid)
	{
		global $entityManager;
		
		$book = $entityManager->find('Books', $bookid);
		//print_r($books);
		
		// get all reviews for the from the orders table
		$orders = $entityManager->getRepository('Orders')->findBy(array('bookid' => $bookid));
		$reviews = array();
		$i=0;
		foreach ($orders as $order)
		{
			if ($order->getReviews() != null)
				$reviews[$i++] = $order->getReviews();
		}	
		return $reviews;		
	}	
}//end class

