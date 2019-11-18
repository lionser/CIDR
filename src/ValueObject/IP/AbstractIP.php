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
     * {@inheritdoc}
     */
    public function getProperAddress(): int
    {
        return ip2long($this->getAddress());
    }

    /**
     * @return int
     */
    abstract public function getVersion(): int;

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return filter_var($this->getAddress(), FILTER_VALIDATE_IP);
    }
    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->getAddress();
    }
}
