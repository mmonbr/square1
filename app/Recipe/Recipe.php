<?php

namespace App\Recipe;

interface Recipe
{
    /**
     * @return mixed
     */
    public function url();

    /**
     * @return mixed
     */
    public function category();

    /**
     * @return mixed
     */
    public function nextPageText();

    /**
     * @return mixed
     */
    public function urlSelector();

    /**
     * @return mixed
     */
    public function priceSelector();

    /**
     * @return mixed
     */
    public function imageSelector();

    /**
     * @return mixed
     */
    public function titleSelector();

    /**
     * @return mixed
     */
    public function productSelector();
}