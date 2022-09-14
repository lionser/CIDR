<?php

declare(strict_types=1);

namespace Lionser\ValueObject;

use Lionser\ValueObject\IP\IpInterface;

class Cidr implements \Stringable
{
    public function __construct(private readonly IpInterface $ip, private readonly int $bits)
    {
    }

    public function getIp(): IpInterface
    {
        return $this->ip;
    }

    public function getBits(): int
    {
        return $this->bits;
    }

    public function __toString(): string
    {
        return "{$this->getIp()}/{$this->getBits()}";
    }
}
