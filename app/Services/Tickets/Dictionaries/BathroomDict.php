<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum BathroomDict: string
{
    use EnumToArray;
    case COMBINED  = 'совмещенный санузел';
    case SEPARATED = 'раздельный санузел';
}
