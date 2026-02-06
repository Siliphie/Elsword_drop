<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemDropRate extends Model
{
    protected $fillable = ['user_id', 'item_name', 'run_attempt', 'drop_rate_ratio'];
}
