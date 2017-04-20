<?php

namespace App\Repository;

use App\Product\Product;
use App\Crawler\Crawler;

class DOMProductRepository implements ProductRepository
{
    /**
     * @var Crawler
     */
    private $crawler;
    /**
     * @var array
     */
    private $products;

    /**
     * DOMProductRepository constructor.
     * @param Crawler $crawler
     */
    public function __construct(Crawler $crawler)
    {
        $this->crawler = $crawler;
        $this->products = $this->crawler->fetch();
    }

    /**
     * @return array
     */
    public function all()
    {
        return $this->products;
    }

    /**
     * @param $url
     * @return array
     */
    public function find($url)
    {
        return array_filter($this->products, function (Product $product) use ($url) {
            return $product->url() === $url;
        });
    }

    /**
     * @param $attribute
     * @param string $order
     * @return $this
     * @throws \Exception
     */
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