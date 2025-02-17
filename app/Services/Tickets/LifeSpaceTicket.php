<?php
declare(strict_types=1);

namespace App\Services\Tickets;

use App\Services\Tickets\Dictionaries\DesignDict;

final class LifeSpaceTicket extends Ticket implements TicketInterface
{
    private float $livingArea;//жилая площадь
    private float $kitchenArea;//площадь кухни
    private int $totalFloors;//всего этажей в жилом доме
    private int $floor;//этаж
    private DesignDict $design;//ремонт

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

    public function getDesign(): DesignDict
    {
        return $this->design;
    }

    public function setDesign(DesignDict $design): void
    {
        $this->design = $design;
    }
}
