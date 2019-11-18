<?php

require 'vendor/autoload.php';

$netmaskDetector = new \IpTool\Detector\NetmaskDetector();
$parser          = new \IpTool\Parser\CIDRParser($netmaskDetector);

$start = new \IpTool\ValueObject\IP\IPv4('1.0.0.0');
$end   = new \IpTool\ValueObject\IP\IPv4('1.0.0.255');
$range = new \IpTool\ValueObject\IP\Range($start, $end);

$cidrs = $parser->parseRange($range);

var_dump($cidrs);

// Or facade usage:

$cidrs = \IpTool\Parser\CIDRParserFacade::parse('1.0.0.0', '1.0.0.255');

var_dump($cidrs);