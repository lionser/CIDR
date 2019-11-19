<?php

require 'vendor/autoload.php';

$netmaskDetector = new \Lionser\Detector\NetmaskDetector();
$parser          = new \Lionser\Parser\CIDRParser($netmaskDetector);

$start = new \Lionser\ValueObject\IP\IPv4('1.0.0.0');
$end   = new \Lionser\ValueObject\IP\IPv4('1.0.0.255');
$range = new \Lionser\ValueObject\IP\Range($start, $end);

$cidrs = $parser->parseRange($range);

var_dump($cidrs);

// Or facade usage:

$cidrs = \Lionser\Parser\CIDRParserFacade::parse('1.0.0.0', '1.0.0.255');

var_dump($cidrs);