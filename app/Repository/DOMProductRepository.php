<?php

namespace App\Repository;

use App\Product\Product;
use App\Crawler\Crawler;

class DOMProductRepository implements ProductRepository
{
    private $crawler;
    private $products;

    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->products = $this->crawler->fetch();
    }

    public function all()
    {
        return $this->products;
    }

    public function find($url)
    {
        return array_filter($this->products, function (Product $product) use ($url) {
            return $product->url() === $url;
        });
    }

    public function orderBy($attribute, $order = 'asc')
    {
        if (!(new \ReflectionClass(Product::class))->getProperty($attribute)) {
            throw new \Exception("Oops, {$attribute} doesn't exist.");
        }

        usort($this->products, function ($a, $b) use ($attribute) {
            if (is_int($a->$attribute()) && is_int($b->$attribute())) {
                return $a->$attribute() - $b->$attribute();
            }

            return strnatcasecmp($a->$attribute(), $b->$attribute());
        });

        if ($order == 'desc') {
            $this->products = array_reverse($this->products);
        }

        return $this;
    }
}