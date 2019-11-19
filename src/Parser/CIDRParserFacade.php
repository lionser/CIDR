<?php declare(strict_types=1);

namespace Lionser\Parser;

use Lionser\Detector\NetmaskDetector;
use Lionser\ValueObject\CIDR;
use Lionser\ValueObject\IP\IPv4;
use Lionser\ValueObject\IP\Range;

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
