<?php

declare(strict_types=1);

namespace Lionser\Detector;

use Lionser\ValueObject\IP\IpInterface;
use Lionser\ValueObject\IP\Netmask;

class NetmaskDetector
{
    public function detect(IpInterface $ip): IpInterface
    {
        return new Netmask(long2ip(-(ip2long($ip->getAddress()) & -(ip2long($ip->getAddress())))));
    }
}
