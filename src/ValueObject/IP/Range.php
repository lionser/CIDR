<?php

declare(strict_types=1);

namespace Lionser\ValueObject\IP;

class Range implements RangeInterface, \Stringable
{
    public function __construct(private readonly IpInterface $start, private readonly IpInterface $end)
    {
    }

    public function getStart(): IpInterface
    {
        return $this->start;
    }

    public function getEnd(): IpInterface
    {
        return $this->end;
    }

    public function __toString(): string
    {
        return "{$this->getStart()}-{$this->getEnd()}";
    }
}
