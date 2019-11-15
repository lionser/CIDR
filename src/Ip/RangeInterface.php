<?php declare(strict_types=1);

namespace IpTool\Ip;

interface RangeInterface
{
    /**
     * @return Ip
     */
    public function getStart(): Ip;

    /**
     * @return Ip
     */
    public function getEnd(): Ip;
}
