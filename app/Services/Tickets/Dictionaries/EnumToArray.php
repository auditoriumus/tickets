<?php
declare(strict_types=1);

namespace App\Services\Tickets\Dictionaries;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function array(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function namesToLowerCase(): array
    {
        return array_map(function ($value) {
            return mb_strtolower($value, 'UTF-8');
        }, self::names());
    }

    public static function valuesToLowerCase(): array
    {
        return array_map(function ($value) {
            return mb_strtolower($value, 'UTF-8');
        }, self::values());
    }
}
