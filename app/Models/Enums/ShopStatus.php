<?php
declare(strict_types=1);

namespace App\Models\Enums;

class ShopStatus
{
    const ACVIVE = 1;
    const INACTIVE = 0;

    public static function all():array
    {
        $reflection = new \ReflectionClass(self::class);
        return $reflection->getConstants();
    }

    public static function description():array
    {
        return [
            self::ACVIVE => 'Włącz',
            self::INACTIVE => 'Wyłącz',
        ];
    }

}
