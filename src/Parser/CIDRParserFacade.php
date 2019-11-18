<?php declare(strict_types=1);

namespace IpTool\Parser;

use IpTool\Detector\NetmaskDetector;
use IpTool\ValueObject\CIDR;
use IpTool\ValueObject\IP\IPv4;
use IpTool\ValueObject\IP\Range;

class CIDRParserFacade
{
    /**
     * @param string $start
     * @param string $end
     *
     * @return CIDR[]
     */
    public static function parse(string $start, string $end): array
    {
        $parser = new CIDRParser(new NetmaskDetector());

        return $parser->parseRange(
            new Range(
                new IPv4($start),
                new IPv4($end)
            )
        );
    }
}
