<?php declare(strict_types=1);

namespace IpTool\ValueObject;

use IpTool\ValueObject\IP\IPInterface;

class CIDR
{
    /**
     * @var IPInterface
     */
    private $ip;

    /**
     * @var int
     */
    private $bits;

    /**
     * @param IPInterface $ip
     * @param int $bits
     */
    public function __construct(IPInterface $ip, int $bits)
    {
        $this->ip   = $ip;
        $this->bits = $bits;
    }

    /**
     * @return IPInterface
     */
    public function getIp(): IPInterface
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
