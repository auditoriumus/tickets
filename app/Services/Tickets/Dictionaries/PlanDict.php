<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum PlanDict: string
{
    case ADJOINING_ROOMS = 'смежные комнаты';
    case SEPARATE_ROOMS  = 'раздельные комнаты';
}
