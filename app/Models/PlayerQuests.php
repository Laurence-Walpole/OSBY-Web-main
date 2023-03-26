<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerQuests extends Model
{
    use HasFactory;

    function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
