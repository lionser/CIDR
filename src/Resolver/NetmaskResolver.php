<?php declare(strict_types=1);

namespace IpTool\Resolver;

class NetmaskResolver
{
    /**
     * @param string $ip
     *
     * @return string
     */
    public function resolve(string $ip): string
    {
        return long2ip(-(ip2long($ip) & -(ip2long($ip))));
    }
}
