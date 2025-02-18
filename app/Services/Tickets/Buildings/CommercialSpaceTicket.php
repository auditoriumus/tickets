<?php
declare(strict_types=1);

namespace App\Services\Tickets\Buildings;

use App\Services\Tickets\Dictionaries\SellerDict;
use App\Services\Tickets\Dictionaries\StateDict;

final class CommercialSpaceTicket extends BuildingTicket implements BuildingTicketInterface
{
    private int $floorsCount = 1;//всего этажей в объекте
    private array $floors    = [1];//занимаемые этажи
    private bool $hasLift;//наличие лифта
    private string $state;//состояние объекта
    private float $height;//высота потолков
    private string $seller;

    public function getFloorsCount(): int
    {
        return $this->floorsCount;
    }

    public function setFloorsCount(int $floorsCount): void
    {
        $this->floorsCount = $floorsCount;
    }

    public function getFloors(): array
    {
        return $this->floors;
    }

    public function setFloors(array $floors): void
    {
        $this->floors = array_unique($floors);
    }

    public function isHasLift(): bool
    {
        return $this->hasLift;
    }

    public function setHasLift(bool $hasLift): void
    {
        $this->hasLift = $hasLift;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function setState(StateDict $state): void
    {
        $this->state = $state->value;
    }

    public function getHeight(): float
    {
        return $this->height ?? 0;
    }
    public function setHeight(float $height): void
    {
        $this->height = $height;
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
