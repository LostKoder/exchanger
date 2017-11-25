<?php
/**
 * Created by PhpStorm.
 * User: evolve
 * Date: 10/17/17
 * Time: 1:19 PM
 */

namespace Exchanger;


class ProviderChain implements DollarToRialRateProvider
{

    /**
     * @var \Exchanger\DollarToRialRateProvider[]
     */
    private $providers;

    public function __construct(array $providers)
    {
        $this->providers = $providers;
    }

    /**
     * @inheritdoc
     */
    public function getRate()
    {
        foreach ($this->providers as $provider) {
            try {
                return $provider->getRate();
            } catch (\Exception $e) {
                // ignore exceptions
            }
        }
        throw $e;
    }


}