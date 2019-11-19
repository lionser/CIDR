<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

use Lionser\IP\Version;

class IPv4 extends AbstractIP
{
    /**
     * {@inheritdoc}
     */
    public function getVersion(): int
    {
        return Version::IP_V4;
    }
}
