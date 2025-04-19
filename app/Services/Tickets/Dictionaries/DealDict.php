<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum DealDict: string
{
    use EnumToArray;
    case SELLING = 'продажа';
    case RENTING = 'аренда';
}
