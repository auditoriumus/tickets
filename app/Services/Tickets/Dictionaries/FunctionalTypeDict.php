<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum FunctionalTypeDict: string
{
    use EnumToArray;
    case COMMERCIAL = 'коммерческое назначение';
    case LIFE       = 'жилое назначение';
}
