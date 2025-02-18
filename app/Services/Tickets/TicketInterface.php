<?php

namespace App\Services\Tickets;

use App\Services\Tickets\Dictionaries\SellerDict;

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
    public function getShare(): string;//доля
    public function setShare(string $share): void;
    public function getTotalArea(): float;//общая площадь
    public function setTotalArea(float $totalArea): void;
    public function getSeller(): string;//продавец (собственник/агент)
    public function setSeller (SellerDict $seller): void;
}
