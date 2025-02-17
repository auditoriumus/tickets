<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum StateDict: string
{
    case BOX = 'коробка';
    case WHITE_BOX = 'готово к ремонту';
    case DONE = 'сделан ремонт';
}
