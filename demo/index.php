<?php

require 'vendor/autoload.php';

$netmaskDetector = new \IpTool\Detector\NetmaskDetector();
$parser          = new \IpTool\Parser\CIDRRangeParser($netmaskDetector);

$start = new \IpTool\ValueObject\IP\IPv4('1.0.0.0');
$end   = new \IpTool\ValueObject\IP\IPv4('1.0.0.255');
$range = new \IpTool\ValueObject\IP\Range($start, $end);

$cidr = $parser->parseRange($range);

var_dump($cidr);