<?php
/**
 * Created by PhpStorm.
 * User: evolve
 * Date: 10/17/17
 * Time: 12:46 PM
 */

namespace Exchanger\Source;


use Exchanger\DollarToRialRateProvider;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class OXEProvider implements DollarToRialRateProvider
{

    public function getRate()
    {
        $client = new Client();
        $content = $client->get(
          'http://www.o-xe.com/'
        )->getBody()->getContents();
        $crawler = new Crawler($content);
        $rate = $crawler->filter(
          'img[src="http://www.o-xe.com/images/flags/64/usa.png"]'
        )
          ->parents()
          ->parents()
          ->filter('td.MonetarySell')
          ->text();

        return str_replace(',','',$rate) * 10;
    }

}