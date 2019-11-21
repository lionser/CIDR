<?php declare(strict_types=1);

namespace Lionser\Parser;

use Lionser\Detector\NetmaskDetector;
use Lionser\ValueObject\Cidr;
use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\Range;

class CidrParserFacade
{
    /**
     * @param string $start
     * @param string $end
     *
     * @return Cidr[]
     */
    public static function parse(string $start, string $end): array
    {
        $parser = new CidrParser(new NetmaskDetector());

        return $parser->parseRange(
            new Range(
                new IpV4($start),
                new IpV4($end)
            )
        );
    }
}
