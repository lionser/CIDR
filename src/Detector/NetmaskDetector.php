<?php declare(strict_types=1);

namespace Lionser\Detector;

use Lionser\ValueObject\IP\IPInterface;
use Lionser\ValueObject\IP\Netmask;

class NetmaskDetector
{
    /**
     * @param IPInterface $ip
     *
     * @return IPInterface
     */
    public function detect(IPInterface $ip): IPInterface
    {
        return new Netmask(long2ip(-(ip2long($ip->getAddress()) & -(ip2long($ip->getAddress())))));
    }
}
