<?php

namespace App\Import;

use App\Product;
use App\Repository\ProductRepository;

class ProductImporter
{
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    public function import()
    {
        foreach ($this->repository->all() as $product) {
            Product::create([
                'url'      => $product->url(),
                'title'    => $product->title(),
                'price'    => $product->price(),
                'image'    => $product->image(),
                'category' => $product->category(),
            ]);
        }
    }
}