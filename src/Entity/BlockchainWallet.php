<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlockchainWalletRepository")
 */
class BlockchainWallet
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=35)
     */
    private $address;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BlockchainTransaction", mappedBy="address_wallet")
     */
    private $blockchainTransactions;

    public function __construct()
    {
        $this->blockchainTransactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection|BlockchainTransaction[]
     */
    public function getBlockchainTransactions(): Collection
    {
        return $this->blockchainTransactions;
    }

    public function addBlockchainTransaction(BlockchainTransaction $blockchainTransaction): self
    {
        if (!$this->blockchainTransactions->contains($blockchainTransaction)) {
            $this->blockchainTransactions[] = $blockchainTransaction;
            $blockchainTransaction->setAddressWallet($this);
        }

        return $this;
    }

    public function removeBlockchainTransaction(BlockchainTransaction $blockchainTransaction): self
    {
        if ($this->blockchainTransactions->contains($blockchainTransaction)) {
            $this->blockchainTransactions->removeElement($blockchainTransaction);
            // set the owning side to null (unless already changed)
            if ($blockchainTransaction->getAddressWallet() === $this) {
                $blockchainTransaction->setAddressWallet(null);
            }
        }

        return $this;
    }
}
