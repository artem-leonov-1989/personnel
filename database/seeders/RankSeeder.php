<?php

namespace Database\Seeders;

use App\Models\RankType;
use Illuminate\Database\Seeder;
use App\Models\Rank;

class RankSeeder extends Seeder
{
    const array RANK_TYPE_LIST = [
        RankType::RANK_CLASS_OFFICER,
        RankType::RANK_CLASS_SERGEANT,
        RankType::RANK_CLASS_SOLDIER,
    ];

    const array RANK_LIST = [
        ['рекрут', 'рекрут', false, RankType::RANK_CLASS_SOLDIER],
        ['солдат', 'матрос', false, RankType::RANK_CLASS_SOLDIER],
        ['старший солдат', 'старший матрос', false, RankType::RANK_CLASS_SOLDIER],
        ['молодший сержант', 'старшина 2 статті', false, RankType::RANK_CLASS_SERGEANT],
        ['сержант', 'старшина 1 статті', false, RankType::RANK_CLASS_SERGEANT],
        ['старший сержант', 'головний старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['головний сержант', 'головний корабельний старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['штаб-сержант', 'штаб-старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['майстер-сержант', 'майстер-старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['старший майстер-сержант', 'старший майстер-старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['головний майстер-сержант', 'головний майстер-старшина', false, RankType::RANK_CLASS_SERGEANT],
        ['молодший лейтенант', 'молодший лейтенант', true, RankType::RANK_CLASS_OFFICER],
        ['лейтенант', 'лейтенант', true, RankType::RANK_CLASS_OFFICER],
        ['старший лейтенант', 'старший лейтенант', true, RankType::RANK_CLASS_OFFICER],
        ['капітан', 'капітан-лейтенант', true, RankType::RANK_CLASS_OFFICER],
        ['майор', 'капітан 3 рангу', true, RankType::RANK_CLASS_OFFICER],
        ['підполковник', 'капітан 2 рангу', true, RankType::RANK_CLASS_OFFICER],
        ['полковник', 'капітан 1 рангу', true, RankType::RANK_CLASS_OFFICER],
        ['бригадний генерал', 'коммондор', false, RankType::RANK_CLASS_OFFICER],
    ];

    const array ADD_NAME = [
        'юстиції',
        'медичної служби',
        'капеланської служби',
    ];

    protected array $rankClassList = [];

    public function run(): void
    {
        foreach (self::RANK_TYPE_LIST as $rankType) {
            RankType::firstOrCreate(
                ['name' => $rankType],
            );
        }
        $this->getRankClassList();
        foreach (self::RANK_LIST as $index => $row) {
            Rank::firstOrCreate(['name' => $row[0], 'standing' => $index, 'rank_type_id' => $this->rankClassList[$row[3]]]);
            Rank::firstOrCreate(['name' => $row[1], 'standing' => $index, 'rank_type_id' => $this->rankClassList[$row[3]]]);
            if ($row[2]) {
                foreach (self::ADD_NAME as $addName) {
                    $newName = $row[0].' '.$addName;
                    Rank::firstOrCreate(['name' => $newName, 'standing' => $index, 'rank_type_id' => $this->rankClassList[$row[3]]]);
                }
            }
        }
    }

    private function getRankClassList(): void
    {
        $collection = RankType::get(['id', 'name']);
        foreach ($collection as $model) {
            $this->rankClassList[$model->name] = $model->id;
        }
    }
}
