This library create CIDR's from IP range.

CIDR - Classless Inter-Domain Routing. See: https://en.wikipedia.org/wiki/Classless_Inter-Domain_Routing

Install:
```bash
composer require iptool/cidr
```

Example:
```php
$parser = new \IpTool\Parser\CidrRangeParser();

$start = new \IpTool\Ip\Ip('1.0.0.0');
$end   = new \IpTool\Ip\Ip('1.0.0.255');
$range = new \IpTool\Ip\IpRange($start, $end);

$cidr = $parser->parseRange($range);
```