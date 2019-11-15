<?php declare(strict_types=1);

namespace IpTool\Ip;

class IpRange implements RangeInterface
{
    /**
     * @var Ip
     */
    private $start;

    /**
     * @var Ip
     */
    private $end;

    /**
     * @param Ip $start
     * @param Ip $end
     */
    public function __construct(Ip $start, Ip $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    /**
     * {@inheritdoc}
     */
    public function getStart(): Ip
    {
        return $this->start;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnd(): Ip
    {
        return $this->end;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->getStart()}-{$this->getEnd()}";
    }
}
