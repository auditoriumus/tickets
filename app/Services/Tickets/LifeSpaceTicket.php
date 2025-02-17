<?php
declare(strict_types=1);

namespace App\Services\Tickets;

final class LifeSpaceTicket extends Ticket implements TicketInterface
{
    private float $livingArea;//жилая площадь
    private float $kitchenArea;//площадь кухни
    private int $totalFloors;//всего этажей
    private int $floor;//этаж
    private bool $hasLift;//наличие лифта
    private string $design;//ремонт

    public function getLivingArea(): float
    {
        return $this->livingArea ?? 0;
    }

    public function setLivingArea(float $livingArea): void
    {
        $this->livingArea = $livingArea;
    }

    public function getKitchenArea(): float
    {
        return $this->kitchenArea;
    }

    public function setKitchenArea(float $kitchenArea): void
    {
        $this->kitchenArea = $kitchenArea;
    }

    public function getTotalFloors(): int
    {
        return $this->totalFloors ?? 0;
    }

    public function setTotalFloors(int $totalFloors): void
    {
        $this->totalFloors = $totalFloors;
    }

    public function getFloor(): int
    {
        return $this->floor ?? 0;
    }

    public function setFloor(int $floor): void
    {
        $this->floor = $floor;
    }

    public function doesHaveLift(): bool
    {
        return $this->hasLift;
    }

    public function setHasLift(bool $hasLift): void
    {
        $this->hasLift = $hasLift;
    }

    public function getDesign(): string
    {
        return $this->design;
    }

    public function setDesign(string $design): void
    {
        $this->design = $design;
    }
}
