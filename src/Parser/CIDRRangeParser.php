<?php declare(strict_types=1);

namespace IpTool\Parser;

use IpTool\Detector\NetmaskDetector;
use IpTool\ValueObject\CIDR;
use IpTool\ValueObject\IP\IPInterface;
use IpTool\ValueObject\IP\IPv4;
use IpTool\ValueObject\IP\RangeInterface;

class CIDRRangeParser implements RangeParserInterface
{
    private const MAX_PREFIX_BITS = 32;

    /**
     * @var NetmaskDetector
     */
    private $netmaskDetector;

    /**
     * @param NetmaskDetector $netmaskDetector
     */
    public function __construct(NetmaskDetector $netmaskDetector)
    {
        $this->netmaskDetector = $netmaskDetector;
    }

    /**
     * {@inheritdoc}
     * @return CIDR[]
     */
    public function parseRange(RangeInterface $range): array
    {
        $start = $range->getStart()->getProperAddress();
        $end   = $range->getEnd()->getProperAddress();

        $cidrs = [];

        while ($end >= $start) {
            $ip       = new IPv4(long2ip($start));
            $maxBits  = $this->getMaxBits($ip);
            $bitsDiff = self::MAX_PREFIX_BITS - intval(log($end - $start + 1) / log(2));
            $bits     = ($maxBits > $bitsDiff) ? $maxBits : $bitsDiff;

            $cidrs[] = new CIDR($ip, $bits);

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
     * @param IPInterface $netmask
     *
     * @return int
     */
    private function convertNetmaskToBits(IPInterface $netmask): int
    {
        return $this->getBitsCount($netmask->getProperAddress());
    }

    /**
     * @param IPInterface $ip
     *
     * @return int
     */
    private function getMaxBits(IPInterface $ip): int
    {
        $netmask = $this->netmaskDetector->detect($ip);

        return $this->convertNetmaskToBits($netmask);
    }
}
