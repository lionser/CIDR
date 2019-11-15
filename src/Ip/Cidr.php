<?php declare(strict_types=1);

namespace IpTool\Ip;

class Cidr
{
    /**
     * @var Ip
     */
    private $ip;

    /**
     * @var int
     */
    private $bits;

    /**
     * @param Ip $ip
     * @param int $bits
     */
    public function __construct(Ip $ip, int $bits)
    {
        $this->ip   = $ip;
        $this->bits = $bits;
    }

    /**
     * @return Ip
     */
    public function getIp(): Ip
    {
        return $this->ip;
    }

    /**
     * @return int
     */
    public function getBits(): int
    {
        return $this->bits;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->getIp()}/{$this->getBits()}";
    }
}