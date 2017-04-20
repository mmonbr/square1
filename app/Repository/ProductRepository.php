<?php

namespace App\Repository;

interface ProductRepository
{
    public function all();

    public function find($url);

    public function orderBy($attribute, $order);
}