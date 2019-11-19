<?php declare(strict_types=1);

namespace Lionser\Parser;

use Lionser\ValueObject\IP\RangeInterface;

interface RangeParserInterface
{
    /**
     * @param RangeInterface $range
     *
     * @return array
     */
    public function parseRange(RangeInterface $range): array;
}
