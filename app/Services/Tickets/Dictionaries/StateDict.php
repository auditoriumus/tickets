<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum StateDict: string
{
    use EnumToArray;
    case BOX        = 'коробка';
    case WHITE_BOX  = 'объект готов к ремонту';
    case DONE       = 'сделан ремонт';
}
