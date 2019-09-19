<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BlockchainTransactionRepository")
 */
class BlockchainTransaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $amount;

    /**
     * @ORM\Column(type="string")
     */
    private $transaction_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_of_confirmations;

    /**
     * @ORM\Column(type="boolean")
     */
    private $transaction_type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\BlockchainWallet", inversedBy="blockchainTransactions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $address_wallet;

    /**
     * @ORM\Column(type="json_array")
     */
    private $addresses_output = [];

    /**
     * @ORM\Column(type="json_array")
     */
    private $addresses_input = [];

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    public function getTransactionId(): ?string
    {
        return $this->transaction_id;
    }

    public function setTransactionId(string $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNumOfConfirmations(): ?int
    {
        return $this->num_of_confirmations;
    }

    public function setNumOfConfirmations(int $num_of_confirmations): self
    {
        $this->num_of_confirmations = $num_of_confirmations;

        return $this;
    }

    public function getTransactionType(): ?bool
    {
        return $this->transaction_type;
    }

    public function setTransactionType(bool $transaction_type): self
    {
        $this->transaction_type = $transaction_type;

        return $this;
    }

    public function getAddressWallet(): ?BlockchainWallet
    {
        return $this->address_wallet;
    }

    public function setAddressWallet(?BlockchainWallet $address_wallet): self
    {
        $this->address_wallet = $address_wallet;

        return $this;
    }

    public function getAddressesOutput(): ?array
    {
        return $this->addresses_output;
    }

    public function setAddressesOutput(array $addresses_output): self
    {
        $this->addresses_output = $addresses_output;

        return $this;
    }

    public function getAddressesInput(): ?array
    {
        return $this->addresses_input;
    }

    public function setAddressesInput(array $addresses_input): self
    {
        $this->addresses_input = $addresses_input;

        return $this;
    }
}
