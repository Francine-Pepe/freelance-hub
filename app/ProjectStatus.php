<?php

namespace App;

enum ProjectStatus: string
{
    case PLANNING = 'planning';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';
    case CANCELLED = 'cancelled';

    public function label(): string
    {
        return match ($this) {
            self::PLANNING => 'Planning',
            self::IN_PROGRESS => 'In progress',
            self::COMPLETED => 'Completed',
            self::CANCELLED => 'Cancelled',
        };
    }
}
