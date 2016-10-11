<?php
// book_handler.php
require_once "../bootstrap.php";

//users and login and signup
class BookHandler
{
	public function getByTitle($title)
	{
		global $entityManager;
		$rep = $entityManager->getRepository('Books');
		$books = $rep->findAll();
		
		foreach ($books as $book) 
		{
			if (strtolower ($book->getTitle()) == strtolower ($title))
			{
				//book found by title
				//return entire book object as an array
				$ret = array(
				'isbn'=>$book->getIsbn(),
				'title'=>$book->getTitle(),
				'author'=>$book->getAuthor(),
				'cover'=>$book->getCover(),
				'publisher'=>$book->getPublisher(),
				'pages'=>$book->getPages(),
				'price'=>$book->getPrice(),
				'reviews'=>$book->getReviews(),
				'description'=>$book->getDescription(),
				'rating'=>$book->getRating(),
				'stock'=>$book->getStock(),
				'genre'=>$book->getGenre(),
				'id'=>$book->getId()
				);
				
				return $ret;
			}
		}
		//no book exist by the title
		return null;
	}
	
	public function getByGenre($genre)
	{
		global $entityManager;
		$rep = $entityManager->getRepository('Books');
		$books = $rep->findAll();
		
		$ret = array();
		$i = 0;
		foreach ($books as $book) 
		{
			if (strtolower ($book->getGenre()) == strtolower ($genre))
			{
				//book found by genre
				//return entire book object as an array
				$ret[$i++] = array(
				'isbn'=>$book->getIsbn(),
				'title'=>$book->getTitle(),
				'author'=>$book->getAuthor(),
				'cover'=>$book->getCover(),
				'publisher'=>$book->getPublisher(),
				'pages'=>$book->getPages(),
				'price'=>$book->getPrice(),
				'reviews'=>$book->getReviews(),
				'description'=>$book->getDescription(),
				'rating'=>$book->getRating(),
				'stock'=>$book->getStock(),
				'genre'=>$book->getGenre(),
				'id'=>$book->getId()
				);
			}
		}
		if ($i == 0)	//no book exist by the genre	
			return null;
		return $ret;
	}


	//returns all books that match the column val with the column name
	public function getByColumn($colName, $colVal)
	{
		global $entityManager;
		
		// All users that are 20 years old
		$books = $entityManager->getRepository('Books')->findBy(array($colName => $colVal));
		//print_r($books);
		
		$ret = array();
		$i = 0;
		foreach ($books as $book) 
		{
			
			//book found by genre
			//return entire book object as an array
			$ret[$i++] = array(
			'isbn'=>$book->getIsbn(),
			'title'=>$book->getTitle(),
			'author'=>$book->getAuthor(),
			'cover'=>$book->getCover(),
			'publisher'=>$book->getPublisher(),
			'pages'=>$book->getPages(),
			'price'=>$book->getPrice(),
			'reviews'=>$book->getReviews(),
			'description'=>$book->getDescription(),
			'rating'=>$book->getRating(),
			'stock'=>$book->getStock(),
			'genre'=>$book->getGenre(),
			'id'=>$book->getId()
			);
			
		}
		//print_r($ret);
		if ($i == 0)	//no book exist	
			return array("status"=> "not found");
			
		return $ret;	
	}

	//returns a book for the product page
	public function getById($bookid)
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

		//book found by genre
			//return entire book object as an array
			$ret = array(
			'isbn'=>$book->getIsbn(),
			'title'=>$book->getTitle(),
			'author'=>$book->getAuthor(),
			'cover'=>$book->getCover(),
			'publisher'=>$book->getPublisher(),
			'pages'=>$book->getPages(),
			'price'=>$book->getPrice(),
			'reviews'=>$book->getReviews(),
			'description'=>$book->getDescription(),
			'rating'=>$book->getRating(),
			'stock'=>$book->getStock(),
			'genre'=>$book->getGenre(),
			'id'=>$book->getId(),
			'reviews'=>$reviews			
			);
			
		return $ret;	
	}
	
		
}	//end class
