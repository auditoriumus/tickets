<?php
declare(strict_types=1);

namespace App\Services\Tickets;

interface TicketInterface
{
    public function getTitle(): string;
    public function setTitle(string $title): void;
    public function getDescription(): string;
    public function setDescription(string $description): void;
    public function getPrice(): float;
    public function setPrice(float $price): void;
    public function getDealType(): string;//тип сделки (аренда/продажа/посуточная аренда)
    public function setDealType(string $dealType): void;
    public function getFunctionalType(): string;//тип назначения (коммерческое/жилое)
    public function setFunctionalType(string $functionalType): void;
    public function getShare(): string;//доля
    public function setShare(string $share): void;
    public function getTotalArea(): float;//общая площадь
    public function setTotalArea(float $totalArea): void;
    public function getYear(): int;//год постройки
    public function setYear(int $year): void;
    public function getLifts(): array;
    public function addServiceLift(): void;
    public function deleteServiceLift(): void;
    public function addPassengerLift(): void;
    public function deletePassengerLift(): void;
}
