<?php declare(strict_types=1);

namespace IpTool\Parser;

use IpTool\ValueObject\CIDR;
use IpTool\ValueObject\IP\RangeInterface;

interface RangeParserInterface
{
    /**
     * @param RangeInterface $range
     *
     * @return CIDR[]
     */
    public function parseRange(RangeInterface $range): array;
}
