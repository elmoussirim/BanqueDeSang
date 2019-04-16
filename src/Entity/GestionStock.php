<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GestionStockRepository")
 */
class GestionStock
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $stock_total;

    /**
     * @ORM\Column(type="integer")
     */
    private $e_stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $s_stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_a_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_a_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_a_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_a_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_b_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_b_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_b_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_b_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_ab_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_ab_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_ab_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_ab_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_o_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_o_positive;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $e_o_negative;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $s_o_negative;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStockTotal(): ?int
    {
        return $this->stock_total;
    }

    public function setStockTotal(int $stock_total): self
    {
        $this->stock_total = $stock_total;

        return $this;
    }

    public function getEStock(): ?int
    {
        return $this->e_stock;
    }

    public function setEStock(int $e_stock): self
    {
        $this->e_stock = $e_stock;

        return $this;
    }

    public function getSStock(): ?int
    {
        return $this->s_stock;
    }

    public function setSStock(int $s_stock): self
    {
        $this->s_stock = $s_stock;

        return $this;
    }

    public function getEAPositive(): ?int
    {
        return $this->e_a_positive;
    }

    public function setEAPositive(int $e_a_positive): self
    {
        $this->e_a_positive = $this->e_a_positive + $e_a_positive;

        return $this;
    }

    public function getSAPositive(): ?int
    {
        return $this->s_a_positive;
    }

    public function setSAPositive(int $s_a_positive): self
    {
        $this->s_a_positive = $this->s_a_positive + $s_a_positive;

        return $this;
    }

    public function getEANegative(): ?int
    {
        return $this->e_a_negative;
    }

    public function setEANegative(int $e_a_negative): self
    {
        $this->e_a_negative = $this->e_a_negative + $e_a_negative;

        return $this;
    }

    public function getSANegative(): ?int
    {
        return $this->s_a_negative;
    }

    public function setSANegative(int $s_a_negative): self
    {
        $this->s_a_negative = $this->s_a_negative + $s_a_negative;

        return $this;
    }

    public function getEBPositive(): ?int
    {
        return $this->e_b_positive;
    }

    public function setEBPositive(int $e_b_positive): self
    {
        $this->e_b_positive = $this->e_b_positive + $e_b_positive;

        return $this;
    }

    public function getSBPositive(): ?int
    {
        return $this->s_b_positive;
    }

    public function setSBPositive(int $s_b_positive): self
    {
        $this->s_b_positive = $this->s_b_positive + $s_b_positive;

        return $this;
    }

    public function getEBNegative(): ?int
    {
        return $this->e_b_negative;
    }

    public function setEBNegative(int $e_b_negative): self
    {
        $this->e_b_negative = $this->e_b_negative + $e_b_negative;

        return $this;
    }

    public function getSBNegative(): ?int
    {
        return $this->s_b_negative;
    }

    public function setSBNegative(int $s_b_negative): self
    {
        $this->s_b_negative = $this->s_b_negative + $s_b_negative;

        return $this;
    }

    public function getEAbPositive(): ?int
    {
        return $this->e_ab_positive;
    }

    public function setEAbPositive(int $e_ab_positive): self
    {
        $this->e_ab_positive = $this->e_ab_positive + $e_ab_positive;

        return $this;
    }

    public function getSAbPositive(): ?int
    {
        return $this->s_ab_positive;
    }

    public function setSAbPositive(int $s_ab_positive): self
    {
        $this->s_ab_positive = $this->s_ab_positive + $s_ab_positive;

        return $this;
    }

    public function getEAbNegative(): ?int
    {
        return $this->e_ab_negative;
    }

    public function setEAbNegative(int $e_ab_negative): self
    {
        $this->e_ab_negative = $this->e_ab_negative + $e_ab_negative;

        return $this;
    }

    public function getSAbNegative(): ?int
    {
        return $this->s_ab_negative;
    }

    public function setSAbNegative(int $s_ab_negative): self
    {
        $this->s_ab_negative = $this->s_ab_negative + $s_ab_negative;

        return $this;
    }

    public function getEOPositive(): ?int
    {
        return $this->e_o_positive;
    }

    public function setEOPositive(int $e_o_positive): self
    {
        $this->e_o_positive = $this->e_o_positive + $e_o_positive;

        return $this;
    }

    public function getSOPositive(): ?int
    {
        return $this->s_o_positive;
    }

    public function setSOPositive(int $s_o_positive): self
    {
        $this->s_o_positive = $this->s_o_positive + $s_o_positive;

        return $this;
    }

    public function getEONegative(): ?int
    {
        return $this->e_o_negative;
    }

    public function setEONegative(int $e_o_negative): self
    {
        $this->e_o_negative = $this->e_o_negative + $e_o_negative;

        return $this;
    }

    public function getSONegative(): ?int
    {
        return $this->s_o_negative;
    }

    public function setSONegative(int $s_o_negative): self
    {
        $this->s_o_negative = $this->s_o_negative + $s_o_negative;

        return $this;
    }
}
