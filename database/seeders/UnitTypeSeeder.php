<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitType;

class UnitTypeSeeder extends Seeder
{
    public function run(): void
    {
        UnitType::firstOrCreate([
            'name' => UnitType::UNIT_TYPE_CONTROL,
        ]);
        UnitType::firstOrCreate([
            'name' => UnitType::UNIT_TYPE_MAIN,
        ]);
        UnitType::firstOrCreate([
            'name' => UnitType::UNIT_TYPE_SUPPORT,
        ]);
        UnitType::firstOrCreate([
            'name' => UnitType::UNIT_TYPE_OTHER,
        ]);
    }
}
