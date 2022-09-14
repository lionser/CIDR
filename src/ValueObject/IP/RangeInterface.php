<?php

declare(strict_types=1);

namespace Lionser\ValueObject\IP;

interface RangeInterface
{
    public function getStart(): IpInterface;

    public function getEnd(): IpInterface;
}
