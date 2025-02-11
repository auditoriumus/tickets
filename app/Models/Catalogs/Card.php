<?php
declare(strict_types=1);

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

/**
 * Справочник Платёжные карты
 */
class Card extends Model
{
    protected $table = 'cards';
}
