<?php

namespace App\Product;

class Product
{
    private $url;
    private $title;
    private $price;
    private $image;
    private $category;

    public function __construct($url, $title, $price, $image, $category)
    {
        $this->url = $url;
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }

    public function url()
    {
        return $this->url;
    }

    public function title()
    {
        return $this->title;
    }

    public function price()
    {
        return $this->price;
    }

    public function image()
    {
        return $this->image;
    }

    public function category()
    {
        return $this->category;
    }
}