<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemDropRate extends Model
{
    protected $fillable = ['user_id', 'item_name', 'run_attempt', 'drop_rate_ratio'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}