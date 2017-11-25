<?php
/**
 * Created by PhpStorm.
 * User: evolve
 * Date: 10/17/17
 * Time: 12:46 PM
 */

namespace Exchanger;


interface DollarToRialRateProvider
{

    /**
     * @return string Dollar rate in rials
     */
    public function getRate();
}