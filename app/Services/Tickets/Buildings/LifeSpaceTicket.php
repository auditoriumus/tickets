<?php
declare(strict_types=1);

namespace App\Services\Tickets\Buildings;

use App\Services\Tickets\Dictionaries\BathroomDict;
use App\Services\Tickets\Dictionaries\DesignDict;
use App\Services\Tickets\Dictionaries\PlanDict;
use App\Services\Tickets\Dictionaries\SellerDict;

final class LifeSpaceTicket extends BuildingTicket implements BuildingTicketInterface
{
    private float $livingArea;//жилая площадь
    private float $kitchenArea;//площадь кухни
    private int $totalFloors;//всего этажей в жилом доме
    private int $floor;//этаж
    private string $design;//ремонт
    private string $plan;//планировка
    private float $height;//высота потолков
    private string $bathroomType;//тип санузла (совмещенный/раздельный)
    private int $bathroomCount = 1;//количество санузлов
    private string $seller;

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

    public function getDesign(): string
    {
        return $this->design;
    }

    public function setDesign(DesignDict $design): void
    {
        $this->design = $design->value;
    }

    public function getPlan(): string
    {
        return $this->plan;
    }

    public function setPlan(PlanDict $plan): void
    {
        $this->plan = $plan->value;
    }

    public function getHeight(): float
    {
        return $this->height ?? 0;
    }
    public function setHeight(float $height): void
    {
        $this->height = $height;
    }

    public function getBathroomType(): string
    {
        return $this->bathroomType;
    }

    public function setBathroomType(BathroomDict $bathroomType): void
    {
        $this->bathroomType = $bathroomType->value;
    }

    public function getBathroomCount(): int
    {
        return $this->bathroomCount;
    }

    public function setBathroomCount(int $bathroomCount): void
    {
        $this->bathroomCount = $bathroomCount;
    }

    public function getSeller(): string
    {
        return $this->seller ?? '';
    }

    public function setSeller(SellerDict $seller): void
    {
        $this->seller = $seller->value;
    }
}
