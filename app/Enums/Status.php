<?php

namespace App\Enums;

enum Status: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case PASSIVE = 'passive';
    case PENDING = 'pending';
    case TRASH = 'trash';

    public static function list(): array
    {
        return array_column(Status::cases(), 'value');
    }
}
