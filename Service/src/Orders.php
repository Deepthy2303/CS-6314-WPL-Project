<?php

class Orders
{
    protected $userid;

    protected $bookid;

    protected $time_stamp;

    protected $status;

    protected $reviews;
	
	protected $id;
	    
	
	public function getId()
	{
		return $this->id;
	}

	public function getUserid()
	{
		return $this->userid;
	}

	public function setUserid($userid)
	{
		$this->userid = $userid;
	}
	
	public function getBookid()
	{
		return $this->bookid;
	}

	public function setBookid($bookid)
	{
		$this->bookid = $bookid;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function setStatus($status)
	{
		$this->status = $status;
	}
	
	public function getReviews()
	{
		return $this->reviews;
	}

	public function setReviews($reviews)
	{
		$this->reviews = $reviews;
	}
	
	public function getTime_stamp()
	{
		return $this->time_stamp;
	}

	public function setTime_stamp($time_stamp)
	{
		$this->time_stamp = $time_stamp;
	}
}
