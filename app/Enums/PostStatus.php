<?php

namespace App\Enums;

enum PostStatus: string
{
    case DRAFT = 'draft';
    case ACTIVE = 'active';
    case PASSIVE = 'passive';
    case PENDING = 'pending';
    case TRASH = 'trash';
}
