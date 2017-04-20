<?php

namespace App\Recipe;

class Dishwashers implements Recipe
{
    public function url()
    {
        return 'https://www.appliancesdelivered.ie/dishwashers';
    }

    public function category()
    {
        return 'Dishwashers';
    }

    public function nextPageText()
    {
        return 'next';
    }


    public function urlSelector()
    {
        return 'h4 a';
    }

    public function priceSelector()
    {
        return '.section-title';
    }

    public function imageSelector()
    {
        return '.product-image img';
    }

    public function titleSelector()
    {
        return 'h4 a';
    }

    public function productSelector()
    {
        return '.search-results-product';
    }
}