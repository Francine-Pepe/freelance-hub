<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Client;
use App\ProjectStatus;

class Project extends Model
{
    protected $fillable = [
        'name',
        'client_id',
        'description',
        'budget',
        'status',
    ];

    protected $casts = [
        'status' => ProjectStatus::class,
    ];

    public function client(): BelongsTo {
        return $this->belongsTo(Client::class); //A project belongs to one client.
    }
}
