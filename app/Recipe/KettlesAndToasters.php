<?php

namespace App\Recipe;

class KettlesAndToasters implements Recipe
{
    /**
     * @return string
     */
    public function url()
    {
        return 'https://www.appliancesdelivered.ie/search/small-appliances/kettles-toasters';
    }

    /**
     * @return string
     */
    public function category()
    {
        return 'Kettles & Toasters';
    }

    /**
     * @return string
     */
    public function nextPageText()
    {
        return 'next';
    }


    /**
     * @return string
     */
    public function urlSelector()
    {
        return 'h4 a';
    }

    /**
     * @return string
     */
    public function priceSelector()
    {
        return '.section-title';
    }

    /**
     * @return string
     */
    public function imageSelector()
    {
        return '.product-image img';
    }

    /**
     * @return string
     */
    public function titleSelector()
    {
        return 'h4 a';
    }

    /**
     * @return string
     */
    public function productSelector()
    {
        return '.search-results-product';
    }
}