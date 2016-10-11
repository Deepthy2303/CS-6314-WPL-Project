<?php
// src/Books.php

class Books
{
    protected $isbn;

    protected $title;

    protected $author;

    protected $cover;

    protected $publisher;

    protected $pages;

    protected $price;

    protected $reviews;

    protected $description;

    protected $rating;

    protected $stock;

    protected $genre;

    protected $id;

    public function getIsbn()
    {
        return $this->isbn;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setIsbn($isbn)
    {
        $this->isbn= $isbn;
    }
	
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }
	
    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($auth)
    {
        $this->author = $auth;
    }
	
    public function getcover()
    {
        return $this->cover;
    }

    public function setCover($cover)
    {
        $this->cover = $cover;
    }
	
    public function getPublisher()
    {
        return $this->publisher;
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }
	
    public function getPages()
    {
        return $this->pages;
    }

    public function setPages($pages)
    {
        $this->pages = $pages;
    }
	
    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
	
    public function getReviews()
    {
        return $this->reviews;
    }

    public function setReviews($reviews)
    {
        $this->reviews = $reviews;
    }
	
    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }
	
    public function getRating()
    {
        return $this->rating;
    }

    public function setRating($rating)
    {
        $this->rating = $rating;
    }
	
    public function getStock()
    {
        return $this->stock;
    }

    public function setStock($stock)
    {
        $this->stock = $stock;
    }
	
    public function getGenre()
    {
        return $this->genre;
    }

    public function setGenre($genre)
    {
        $this->genre = $genre;
    }
}
