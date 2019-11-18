<?php declare(strict_types=1);

namespace IpTool\ValueObject\IP;

interface RangeInterface
{
    /**
     * @return IPInterface
     */
    public function getStart(): IPInterface;

    /**
     * @return IPInterface
     */
    public function getEnd(): IPInterface;
}
