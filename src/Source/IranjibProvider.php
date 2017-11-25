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

class IranjibProvider implements DollarToRialRateProvider
{

    public function getRate()
    {
        $client = new Client();
        $content = $client->get(
          'https://www.iranjib.ir/showgroup/23/realtime_price/'
        )->getBody()->getContents();
        $crawler = new Crawler($content);
        $rate = $crawler->filter(
          'td#f_103_66 span'
        )
          ->text();

        return str_replace(',', '', $rate) * 10;
    }

}