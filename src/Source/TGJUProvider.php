<?php
/**
 * Created by PhpStorm.
 * User: evolve
 * Date: 10/17/17
 * Time: 1:25 PM
 */

namespace Exchanger\Source;


use Exchanger\DollarToRialRateProvider;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

class TGJUProvider implements DollarToRialRateProvider
{

    public function getRate()
    {
        $client = new Client();
        $content = $client->get(
          'http://www.tgju.org/'
        )->getBody()->getContents();
        $crawler = new Crawler($content);
        $rate = $crawler->filter(
          "tr[data-market-row='price_dollar_dt']"
        )
          ->filter('td')
          ->first()
          ->text();

        return str_replace(',', '', $rate);
    }

}