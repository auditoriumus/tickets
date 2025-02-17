<?php

namespace App\Services\Tickets\Dictionaries;

enum DesignDict: string
{
    case BOX = 'коробка';
    case WHITE_BOX = 'черновой';
    case OLD = 'без ремонта';
    case COSMETIC = 'косметический';
    case EURO = 'евроремонт';
    case DESIGNED = 'дизайнерский';
}
