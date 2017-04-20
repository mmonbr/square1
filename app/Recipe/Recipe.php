<?php

namespace App\Recipe;

interface Recipe
{
    public function url();

    public function category();

    public function nextPageText();

    public function urlSelector();

    public function priceSelector();

    public function imageSelector();

    public function titleSelector();

    public function productSelector();
}