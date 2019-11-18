<?php declare(strict_types=1);

namespace IpTool\ValueObject\IP;

class Range implements RangeInterface
{
    /**
     * @var IPInterface
     */
    private $start;

    /**
     * @var IPInterface
     */
    private $end;

    /**
     * @param IPInterface $start
     * @param IPInterface $end
     */
    public function __construct(IPInterface $start, IPInterface $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    /**
     * {@inheritdoc}
     */
    public function getStart(): IPInterface
    {
        return $this->start;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnd(): IPInterface
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
