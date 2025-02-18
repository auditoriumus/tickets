<?php
declare(strict_types=1);

namespace App\Services\Tickets;

interface BuildingTicketInterface extends TicketInterface
{
    public function getFunctionalType(): string;//тип назначения (коммерческое/жилое)
    public function setFunctionalType(string $functionalType): void;
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
