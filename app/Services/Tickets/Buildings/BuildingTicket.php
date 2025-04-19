<?php
declare(strict_types=1);

namespace App\Services\Tickets\Buildings;

use App\Services\Tickets\Dictionaries\DealDict;
use App\Services\Tickets\Dictionaries\FunctionalTypeDict;
use Exception;

abstract class BuildingTicket implements BuildingTicketInterface
{
    private string $title;
    private string $description;
    private float $price;
    private string $dealType;
    private string $functionalType;
    private float $totalArea;
    private int $year;
    private array $lifts;//лифты
    private string $share            = '1';
    const string SERVICE_LIFT        = 'service';
    const string PASSENGER_LIFT      = 'passenger';

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
    public function setDealType(DealDict $dealType): void
    {
        $this->dealType = $dealType->value;
    }
    public function getFunctionalType(): string
    {
        return $this->functionalType ?? '';
    }
    public function setFunctionalType(FunctionalTypeDict $functionalType): void
    {
        $this->functionalType = $functionalType->value;
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

    public function getYear(): int
    {
        return $this->year;
    }

    /**
     * @throws Exception
     */
    public function setYear(int $year): void
    {
        $this->year = $year;
    }

    public function getLifts(): array
    {
        return $this->lifts;
    }

    public function addServiceLift(): void
    {
        if (!in_array(self::SERVICE_LIFT, $this->lifts)) {
            $this->lifts[] = self::SERVICE_LIFT;
        }
    }

    public function deleteServiceLift(): void
    {
        if (in_array(self::SERVICE_LIFT, $this->lifts)) {
            $key = array_search(self::SERVICE_LIFT, $this->lifts);
            unset($this->lifts[$key]);
        }
    }

    public function addPassengerLift(): void
    {
        if (!in_array(self::PASSENGER_LIFT, $this->lifts)) {
            $this->lifts[] = self::PASSENGER_LIFT;
        }
    }
    public function deletePassengerLift(): void
    {
        if (in_array(self::PASSENGER_LIFT, $this->lifts)) {
            $key = array_search(self::PASSENGER_LIFT, $this->lifts);
            unset($this->lifts[$key]);
        }
    }

}
