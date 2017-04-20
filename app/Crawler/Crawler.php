<?php

namespace App\Crawler;

use App\Recipe\Recipe;
use App\Product\Product;
use Goutte\Client as GoutteClient;
use GuzzleHttp\Client as GuzzleClient;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Crawler
{
    private $goutteClient;
    private $guzzleClient;
    private $recipe;

    public function __construct(GoutteClient $goutteClient, GuzzleClient $guzzleClient, Recipe $recipe)
    {
        $this->goutteClient = $goutteClient;
        $this->guzzleClient = $guzzleClient;
        $this->recipe = $recipe;
    }

    public function fetch()
    {
        $request = $this->goutteClient->request('GET', $this->recipe->url());

        $items = $this->extract($request);

        while ($this->hasMorePages($request)) {
            $nextPageLink = $request->selectLink($this->recipe->nextPageText())->link();

            $request = $this->goutteClient->request('GET', $nextPageLink->getUri());

            $items = array_merge($this->extract($request), $items);
        }

        return $items;
    }

    private function extract(DomCrawler $crawler)
    {
        return $crawler->filter($this->recipe->productSelector())->each(function (DomCrawler $crawler) {
            $url = $crawler->filter($this->recipe->urlSelector())->first()->attr('href');
            $title = $crawler->filter($this->recipe->titleSelector())->first()->html();
            $price = $crawler->filter($this->recipe->priceSelector())->first()->html();
            $image = $crawler->filter($this->recipe->imageSelector())->first()->attr('src');
            $category = $this->recipe->category();

            return new Product(
                $url,
                $title,
                $price,
                $image,
                $category
            );
        });
    }

    private function hasMorePages(DomCrawler $crawler)
    {
        try {
            return $crawler->filterXPath("//a[text()='{$this->recipe->nextPageText()}']")->first()->html() === $this->recipe->nextPageText();
        } catch (\InvalidArgumentException $exception) {
            return false;
        }
    }
}