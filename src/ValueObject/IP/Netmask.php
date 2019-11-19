<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

class Netmask extends AbstractIP
{
    /**
     * {@inheritdoc}
     */
    public function getVersion(): int
    {
        return Version::IP_V4;
    }
}
