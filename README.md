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
composer require iptool/cidr
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
$netmaskResolver = new \IpTool\Resolver\NetmaskResolver();
$parser          = new \IpTool\Parser\CidrRangeParser($netmaskResolver);

$start = new \IpTool\Ip\Ip('1.0.0.0');
$end   = new \IpTool\Ip\Ip('1.0.0.255');
$range = new \IpTool\Ip\IpRange($start, $end);

/** @var $cidrs \IpTool\Ip\Cidr[] */
$cidrs = $parser->parseRange($range);

foreach($cidrs as $cidr) {
    echo $cidr; # '1.0.0.0\24'
}
```