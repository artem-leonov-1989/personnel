<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rank extends Model
{
    protected $fillable = [
        'name',
        'rank_type_id',
        'standing',
    ];

    public function rankType(): BelongsTo
    {
        return $this->belongsTo(RankType::class);
    }
}
