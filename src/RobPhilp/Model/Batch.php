<?php

namespace RobPhilp\Model;

class Batch implements BatchInterface
{
    const STATE_OPEN      = 'open';
    const STATE_CLOSED    = 'closed';

    /**
     * @var string
     */
    private $state;

    /**
     * @var \DateTimeImmutable
     */
    private $openedTime;

    /**
     * @var \DateTimeImmutable
     */
    private $closedTime;

    /**
     * @var PackageInterface[]
     */
    private $packages;

    /**
     * Batch constructor.
     */
    public function __construct()
    {
        $this->state = self::STATE_OPEN;
        $this->openedTime = new \DateTimeImmutable();

        $this->packages = [];
    }

    /**
     * @return void
     */
    public function open()
    {
        $this->state = self::STATE_OPEN;
    }

    /**
     * @return void
     */
    public function close()
    {
        $this->state = self::STATE_CLOSED;
        $this->closedTime = new \DateTimeImmutable();
    }

    /**
     * @inheritdoc
     */
    public function getOpenedTime(): \DateTimeImmutable
    {
        return $this->openedTime;
    }

    /**
     * @inheritdoc
     */
    public function getClosedTime(): \DateTimeImmutable
    {
        return $this->closedTime;
    }

    /**
     * @param PackageInterface $package
     *
     * @throws \Exception
     *
     * @return void
     */
    public function addPackage(PackageInterface $package)
    {
        if ($this->state == self::STATE_CLOSED) {
            throw new \Exception('Cannot add packages to a closed batch');
        }

        $this->packages[] = $package;
    }

    /**
     * @param string $number
     *
     * @return PackageInterface|null
     */
    public function getPackageByConsignmentNumber(string $number): ?PackageInterface
    {
        foreach($this->packages as $package) {
            if ($package->getConsignmentNumber() === $number) {
                return $package;
            }
        }

        return null;
    }


    /**
     * @param string $number
     *
     * @return void
     */
    public function removePackageByConsignmentNumber(string $number)
    {
        // filter out package to remove based on consignment number
        $this->packages = array_filter($this->packages, function($item) use ($number) {
            /** @var PackageInterface $item */
            return $item->getConsignmentNumber() !== $number;
        });
    }

    /**
     * @return PackageInterface[]
     */
    public function getPackages(): array
    {
        return $this->packages;
    }

}