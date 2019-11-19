# The CIDR library for create CIDR's from IP range.

[![Build Status](https://travis-ci.com/dev-sl/cidr.svg?branch=master)](https://travis-ci.com/dev-sl/cidr)

CIDR - Classless Inter-Domain Routing. [Wiki](https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing)

## Installing CIDR Library

The recommended way to install CIDR Library is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of CIDR Library:

```bash
composer require lionser/cidr
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update CIDR Library using composer:

 ```bash
composer update
 ```

Usage example:

```php
$netmaskDetectror = new \Lionser\Detector\NetmaskDetector();
$parser           = new \Lionser\Parser\CIDRRangeParser($netmaskDetectror);

$start = new \Lionser\ValueObject\IP\IPv4('1.0.0.0');
$end   = new \Lionser\ValueObject\IP\IPv4('1.0.0.255');
$range = new \Lionser\ValueObject\IP\Range($start, $end);

/** @var $cidrs \Lionser\ValueObject\CIDR[] */
$cidrs = $parser->parseRange($range);

# Or facade usage

/** @var $cidrs \Lionser\ValueObject\CIDR[] */
$cidrs = \Lionser\Parser\CIDRParserFacade::parse('1.0.0.0', '1.0.0.255');

foreach($cidrs as $cidr) {
    echo $cidr; # '1.0.0.0\24'
}
```