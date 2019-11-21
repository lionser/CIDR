<?php declare(strict_types=1);

namespace Lionser\ValueObject;

use Lionser\ValueObject\IP\IpInterface;

class Cidr
{
    /**
     * @var IpInterface
     */
    private $ip;

    /**
     * @var int
     */
    private $bits;

    /**
     * @param IpInterface $ip
     * @param int $bits
     */
    public function __construct(IpInterface $ip, int $bits)
    {
        $this->ip   = $ip;
        $this->bits = $bits;
    }

    /**
     * @return IpInterface
     */
    public function getIp(): IpInterface
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
