<?php
declare(strict_types=1);

namespace App\Services\Tickets;

abstract class Ticket implements TicketInterface
{
    private string $title;
    private string $description;
    private float $price;
    private string $dealType;
    private string $functionalType;
    private string $share;
    private float $totalArea;

    public function getTitle(): string
    {
        return $this->title ?? '';
    }
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }
    public function getDescription(): string
    {
        return $this->description ?? '';
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
    public function getPrice(): float
    {
        return $this->price ?? 0;
    }
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
    public function getDealType(): string
    {
        return $this->dealType ?? '';
    }
    public function setDealType(string $dealType): void
    {
        $this->dealType = $dealType;
    }
    public function getFunctionalType(): string
    {
        return $this->functionalType ?? '';
    }
    public function setFunctionalType(string $functionalType): void
    {
        $this->functionalType = $functionalType;
    }
    public function getShare(): string
    {
        return $this->share ?? '';
    }
    public function setShare(string $share): void
    {
        $this->share = $share;
    }
    public function getTotalArea(): float
    {
        return $this->totalArea ?? 0;
    }
    public function setTotalArea(float $totalArea): void
    {
        $this->totalArea = $totalArea;
    }
}
