<?php declare(strict_types=1);

namespace IpTool\ValueObject\IP;

interface RangeInterface
{
    public function getStart();
    public function getEnd();
}
