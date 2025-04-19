<?php
declare(strict_types=1);

namespace App\Services\Tickets\Buildings;

use App\Services\Tickets\Dictionaries\FunctionalTypeDict;
use App\Services\Tickets\TicketInterface;

interface BuildingTicketInterface extends TicketInterface
{
    public function getFunctionalType(): string;//тип назначения (коммерческое/жилое)
    public function setFunctionalType(FunctionalTypeDict $functionalType): void;
    public function getYear(): int;//год постройки
    public function setYear(int $year): void;
    public function getHeight(): float;//высота потолков
    public function setHeight(float $height): void;
    public function getLifts(): array;
    public function addServiceLift(): void;
    public function deleteServiceLift(): void;
    public function addPassengerLift(): void;
    public function deletePassengerLift(): void;
}
