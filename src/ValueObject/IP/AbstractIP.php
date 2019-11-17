<?php declare(strict_types=1);

namespace IpTool\ValueObject\IP;

abstract class AbstractIP implements IPInterface
{
    /**
     * @var string
     */
    protected $address;

    /**
     * @param string $address
     */
    public function __construct(string $address)
    {
        $this->address = $address;
    }

    /**
     * {@inheritdoc}
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return int
     */
    abstract public function getVersion(): int;

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getAddress();
    }
}
