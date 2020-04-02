<?php
declare(strict_types=1);

namespace App\Models\Enums;

class ModuleType
{
    const CATEGORIES = 'categories';
    const SERVICES = 'services';
    const PORTFOLIO = 'portfolio';
    const CERTIFICATES = 'certificates';
    const PRICING = 'pricing';

    public static function all():array
    {
        $reflection = new \ReflectionClass(self::class);
        return $reflection->getConstants();
    }



}
