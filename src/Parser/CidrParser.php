<?php

declare(strict_types=1);

namespace Lionser\Parser;

use Lionser\Detector\NetmaskDetector;
use Lionser\ValueObject\Cidr;
use Lionser\ValueObject\IP\IpInterface;
use Lionser\ValueObject\IP\IpV4;
use Lionser\ValueObject\IP\RangeInterface;

class CidrParser implements RangeParserInterface
{
    private const MAX_PREFIX_BITS = 32;

    public function __construct(private readonly NetmaskDetector $netmaskDetector)
    {
    }

    /**
     * @return Cidr[]
     */
    public function parseRange(RangeInterface $range): array
    {
        $start = $range->getStart()->getProperAddress();
        $end   = $range->getEnd()->getProperAddress();

        $cidrs = [];

        while ($end >= $start) {
            $ip       = new IpV4(long2ip($start));
            $maxBits  = $this->getMaxBits($ip);
            $bitsDiff = self::MAX_PREFIX_BITS - intval(log($end - $start + 1) / log(2));
            $bits     = ($maxBits > $bitsDiff) ? $maxBits : $bitsDiff;

            $cidrs[] = new Cidr($ip, $bits);

            $start += pow(2, (self::MAX_PREFIX_BITS - $bits));
        }

        return $cidrs;
    }

    private function getBitsCount(int $int): int
    {
        $int = $int & 0xFFFFFFFF;
        $int = ($int & 0x55555555) + (($int >> 1) & 0x55555555);
        $int = ($int & 0x33333333) + (($int >> 2) & 0x33333333);
        $int = ($int & 0x0F0F0F0F) + (($int >> 4) & 0x0F0F0F0F);
        $int = ($int & 0x00FF00FF) + (($int >> 8) & 0x00FF00FF);
        $int = ($int & 0x0000FFFF) + (($int >> 16) & 0x0000FFFF);
        $int = $int & 0x0000003F;

        return $int;
    }

    private function convertNetmaskToBits(IpInterface $netmask): int
    {
        return $this->getBitsCount($netmask->getProperAddress());
    }

    private function getMaxBits(IpInterface $ip): int
    {
        $netmask = $this->netmaskDetector->detect($ip);

        return $this->convertNetmaskToBits($netmask);
    }
}
