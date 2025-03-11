<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitType extends Model
{
    const string UNIT_TYPE_CONTROL = 'Управління';
    const string UNIT_TYPE_MAIN = 'Основний підрозділ';
    const string UNIT_TYPE_SUPPORT = 'Підрозділ забезпечення';
    const string UNIT_TYPE_OTHER = 'Інше';
    protected $fillable = [
        'name'
    ];

    public function units(): HasMany
    {
        return $this->hasMany(Unit::class);
    }
}
