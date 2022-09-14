<?php

declare(strict_types=1);

namespace Lionser\ValueObject\IP;

interface IpInterface
{
    public function getAddress(): string;

    public function getProperAddress(): int;
}
