<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RankType extends Model
{
    const string RANK_CLASS_OFFICER = 'офіцер';

    const string RANK_CLASS_SERGEANT = 'сержант';

    const string RANK_CLASS_SOLDIER = 'солдат';

    protected $fillable = [
        'name',
    ];

    public function ranks(): HasMany
    {
        return $this->hasMany(Rank::class);
    }
}
