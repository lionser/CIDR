<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

interface RangeInterface
{
    /**
     * @return IpInterface
     */
    public function getStart(): IpInterface;

    /**
     * @return IpInterface
     */
    public function getEnd(): IpInterface;
}
