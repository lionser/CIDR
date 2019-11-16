<?php

require 'vendor/autoload.php';

$netmaskResolver = new \IpTool\Resolver\NetmaskResolver();
$parser          = new \IpTool\Parser\CidrRangeParser($netmaskResolver);

$start = new \IpTool\Ip\Ip('1.0.0.0');
$end   = new \IpTool\Ip\Ip('1.0.0.255');
$range = new \IpTool\Ip\IpRange($start, $end);

$cidr = $parser->parseRange($range);

var_dump($cidr);