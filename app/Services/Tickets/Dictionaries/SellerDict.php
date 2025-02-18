<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

enum SellerDict: string
{
    case OWNER = 'собственник';
    case AGENT = 'агент';
}
