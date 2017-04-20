<?php

namespace App\Repository;

interface ProductRepository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $url
     * @return mixed
     */
    public function find($url);

    /**
     * @param $attribute
     * @param $order
     * @return mixed
     */
    public function orderBy($attribute, $order);
}