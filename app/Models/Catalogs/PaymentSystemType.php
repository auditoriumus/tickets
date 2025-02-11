<?php
declare(strict_types=1);

namespace App\Models\Catalogs;

use Illuminate\Database\Eloquent\Model;

/**
 * Справочник Платежные системы
 */
class PaymentSystemType extends Model
{
    protected $table = 'payment_systems_types';
}
