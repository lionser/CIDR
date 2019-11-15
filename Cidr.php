<?php

namespace Cidr;

class Cidr
{
    public function ipRangeToCidr($start, $end)
    {
        $start = ip2long($start);
        $end   = ip2long($end);

        $listCIDRs = [];

        while ($end >= $start) {
            $maxsize     = $this->maxBlock(long2ip($start));
            $maxdiff     = 32 - intval(log($end - $start + 1) / log(2));
            $size        = ($maxsize > $maxdiff) ? $maxsize : $maxdiff;
            $listCIDRs[] = long2ip($start) . "/$size";

            $start += pow(2, (32 - $size));
        }

        return $listCIDRs;
    }

    private function countSetbits($int)
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

    private function maskToCIDR($netmask)
    {
        return $this->countSetbits(ip2long($netmask));
    }

    private function maxBlock($ipinput)
    {
        return $this->maskToCIDR(long2ip(-(ip2long($ipinput) & -(ip2long($ipinput)))));
    }
}