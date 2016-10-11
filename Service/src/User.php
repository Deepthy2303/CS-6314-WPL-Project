<?php

class User
{
    protected $name;

    protected $password;

    protected $email;

    protected $lastlogin;

    protected $failedlogin;

    protected $imageurl;

    protected $address;

    protected $phone;

    protected $id;
	
	public function getId()
	{
		return $this->id;
	}

	public function getPassword()
	{
		return $this->password;
	}

	public function setPassword($password)
	{
		$this->password = $password;
	}
	
	public function getEmail()
	{
		return $this->email;
	}

	public function setEmail($email)
	{
		$this->email = $email;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName($name)
	{
		$this->name = $name;
	}
	
	public function getLastlogin()
	{
		return $this->lastlogin;
	}

	public function setLastlogin($lastlogin)
	{
		$this->lastlogin = $lastlogin;
	}

	public function getFailedlogin()
	{
		return $this->failedlogin;
	}

	public function setFailedlogin()
	{
		if ($this->failedlogin == null)
			$this->failedlogin = 1;
		//update the number of failed logins
		else
			$this->failedlogin++;
	}

	public function getImageurl()
	{
		return $this->imageurl;
	}

	public function setImageurl($imageurl)
	{
		$this->imageurl = $imageurl;
	}

	public function getAddress()
	{
		return $this->address;
	}

	public function setAddress($address)
	{
		$this->address = $address;
	}

	public function getPhone()
	{
		return $this->phone;
	}

	public function setPhone($phone)
	{
		$this->phone = $phone;
	}
}
