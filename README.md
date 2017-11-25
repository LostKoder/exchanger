# Dollar to Rial exchanger

Collect dollar rate from various sources like:
 - http://www.tgju.org/
 - http://www.o-xe.com/
 - https://www.iranjib.ir/showgroup/23/realtime_price/

### Installation

Simply enter  `composer require lostkoder/exchanger` in terminal.

### Quick Start

```php
<?php

$provider = new \Exchanger\ProviderChain([
  new \Exchanger\Source\OXEProvider(),
  new \Exchanger\Source\IranjibProvider(),
  new \Exchanger\Source\TGJUProvider(),
]);

$rate = $provider->getRate();
```

### Custom Rate Providers

Create a provider class which implements `DollarToRialRateProvider` interface and plug it in `ProviderChain` mentioned in quick start.