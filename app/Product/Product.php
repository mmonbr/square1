<?php

namespace App\Product;

class Product
{
    /**
     * @var
     */
    private $url;
    /**
     * @var
     */
    private $title;
    /**
     * @var
     */
    private $price;
    /**
     * @var
     */
    private $image;
    /**
     * @var
     */
    private $category;

    /**
     * Product constructor.
     * @param $url
     * @param $title
     * @param $price
     * @param $image
     * @param $category
     */
    public function __construct($url, $title, $price, $image, $category)
    {
        $this->url = $url;
        $this->title = $title;
        $this->price = $price;
        $this->image = $image;
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function url()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return mixed
     */
    public function price()
    {
        return $this->price;
    }

    /**
     * @return mixed
     */
    public function image()
    {
        return $this->image;
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->category;
    }
}