<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum DesignDict: string
{
    use EnumToArray;
    case BOX        = 'коробка';
    case WHITE_BOX  = 'черновой ремонт';
    case OLD        = 'без ремонта';
    case COSMETIC   = 'косметический ремонт';
    case EURO       = 'евроремонт';
    case DESIGNED   = 'дизайнерский ремонт';
}
