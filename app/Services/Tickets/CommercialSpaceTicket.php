<?php
declare(strict_types=1);

namespace App\Services\Tickets;

use App\Services\Tickets\Dictionaries\StateDict;

class CommercialSpaceTicket extends Ticket implements TicketInterface
{
    private int $floorsCount = 1;//всего этажей в объекте
    private array $floors = [1];//занимаемые этажи
    private bool $hasLift;//наличие лифта
    private StateDict $state;//состояние объекта
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

    public function getState(): StateDict
    {
        return $this->state;
    }

    public function setState(StateDict $state): void
    {
        $this->state = $state;
    }
}
