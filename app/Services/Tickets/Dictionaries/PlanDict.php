<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum PlanDict: string
{
    use EnumToArray;
    case ADJOINING_ROOMS = 'смежные комнаты';
    case SEPARATE_ROOMS  = 'раздельные комнаты';
}
