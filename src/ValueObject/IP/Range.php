<?php declare(strict_types=1);

namespace Lionser\ValueObject\IP;

class Range implements RangeInterface
{
    /**
     * @var IpInterface
     */
    private $start;

    /**
     * @var IpInterface
     */
    private $end;

    /**
     * @param IpInterface $start
     * @param IpInterface $end
     */
    public function __construct(IpInterface $start, IpInterface $end)
    {
        $this->start = $start;
        $this->end   = $end;
    }

    /**
     * {@inheritdoc}
     */
    public function getStart(): IpInterface
    {
        return $this->start;
    }

    /**
     * {@inheritdoc}
     */
    public function getEnd(): IpInterface
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
