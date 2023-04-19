<?php

namespace App\Enums;

enum CategoryColors: string
{
    case LARAVEL = '#FB503B';
    case PHP = '#81D8F5';
    case SQL = '#E4EE85';
    case FRONTEND = '#FD2155';
    case WEB_DEVELOPMENT = '#08FDD8';
    case JAVASCRIPT = '#FFA500';
    case OTHER = '#CCCCFF';

    public static function list(): array
    {
        $cases = CategoryColors::cases();

        return array_combine(
            array_map(fn ($case) => $case->name, $cases),
            array_map(fn ($case) => $case->value, $cases)
        );
    }
}
