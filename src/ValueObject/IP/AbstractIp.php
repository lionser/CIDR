<?php

declare(strict_types=1);

namespace Lionser\ValueObject\IP;

use Lionser\IP\Version;

abstract class AbstractIp implements IpInterface, \Stringable
{
    public function __construct(protected readonly string $address)
    {
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getProperAddress(): int
    {
        return ip2long($this->getAddress());
    }

    abstract public function getVersion(): Version;

    public function isValid(): bool
    {
        return (bool) filter_var($this->getAddress(), FILTER_VALIDATE_IP);
    }

    public function __toString(): string
    {
        return $this->getAddress();
    }
}
