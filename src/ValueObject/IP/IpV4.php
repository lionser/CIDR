<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

use Lionser\IP\Version;

class IpV4 extends AbstractIp
{
    /**
     * {@inheritdoc}
     */
    public function getVersion(): int
    {
        return Version::IP_V4;
    }
}
