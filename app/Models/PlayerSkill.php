<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlayerSkill extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'player_id',
        'skill_id',
        'skill_level',
        'player_exp',
        'boosted_for',
        'depleted_for',
        'skill_points',
        'skill_task_streak',
    ];

    function player(): BelongsTo
    {
        return $this->belongsTo(Player::class, 'player_id');
    }
}
