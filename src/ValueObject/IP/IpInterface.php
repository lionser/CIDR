<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

interface IpInterface
{
    /**
     * @return string
     */
    public function getAddress(): string;

    /**
     * @return int
     */
    public function getProperAddress(): int;
}
