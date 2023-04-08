<?php

namespace App\Http\Traits;

trait ColorTrait
{
    private static function convertToColor(string $color): ?string
    {
        // Remove any "#" prefix
        $value = ltrim($color, '#');

        // Check if the value contains only hexadecimal characters
        if (!ctype_xdigit($value)) {
            return null;
        }

        // Fill with zeros from start of the string if string less than 6 chars
        $value = str_pad($value, 6, '0', STR_PAD_LEFT);

        // Add the "#" prefix and return the result
        return '#' . $value;
    }
}
