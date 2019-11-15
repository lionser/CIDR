<?php declare(strict_types=1);

namespace IpTool\Parser;

use IpTool\Ip\Cidr;
use IpTool\Ip\Ip;
use IpTool\Ip\RangeInterface;

class CidrRangeParser implements RangeParserInterface
{
    private const MAX_PREFIX_BITS = 32;

    /**
     * {@inheritdoc}
     */
    public function parseRange(RangeInterface $range): array
    {
        $start = ip2long((string)$range->getStart());
        $end   = ip2long((string)$range->getEnd());

        $cidrs = [];

        while ($end >= $start) {
            $maxBits  = $this->getMaxBits(long2ip($start));
            $bitsDiff = self::MAX_PREFIX_BITS - intval(log($end - $start + 1) / log(2));
            $bits     = ($maxBits > $bitsDiff) ? $maxBits : $bitsDiff;

            $ip      = new Ip(long2ip($start));
            $cidrs[] = new Cidr($ip, $bits);

            $start += pow(2, (self::MAX_PREFIX_BITS - $bits));
        }

        return $cidrs;
    }

    /**
     * @param int $int
     *
     * @return int
     */
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

    /**
     * @param string $netmask
     *
     * @return int
     */
    private function convertMaskToBits(string $netmask): int
    {
        return $this->getBitsCount(ip2long($netmask));
    }

    /**
     * @param string $ip
     *
     * @return int
     */
    private function getMaxBits(string $ip): int
    {
        return $this->convertMaskToBits($this->getNetmask($ip));
    }

    /**
     * @param string $ip
     *
     * @return string
     */
    private function getNetmask(string $ip): string
    {
        return long2ip(-(ip2long($ip) & -(ip2long($ip))));
    }
}
