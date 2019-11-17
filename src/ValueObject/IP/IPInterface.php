<?php declare(strict_type=1);

namespace IpTool\ValueObject\IP;

interface IPInterface
{
    /**
     * @return string
     */
    public function getAddress(): string;
}
