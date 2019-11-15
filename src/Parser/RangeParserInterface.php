<?php declare(strict_types=1);

namespace IpTool\Parser;

use IpTool\Ip\Cidr;
use IpTool\Ip\RangeInterface;

interface RangeParserInterface
{
    /**
     * @param RangeInterface $range
     *
     * @return Cidr[]
     */
    public function parseRange(RangeInterface $range): array;
}
