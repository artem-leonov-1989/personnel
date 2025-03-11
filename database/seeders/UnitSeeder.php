<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UnitType;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    const UNIT_LIST = [
        [
            'name' => 'Командування',
            'name_in_staff_file' => 'Командування',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 1,
        ],
        [
            'name' => 'Юридична служба',
            'name_in_staff_file' => 'Юридична служба',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 2,
        ],
        [
            'name' => 'Відділення комунікацій',
            'name_in_staff_file' => 'Відділення комунікацій',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 3,
        ],
        [
            'name' => 'Штаб',
            'name_in_staff_file' => 'Штаб',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 4,
        ],
        [
            'name' => 'Відділення психологічної підтримки персоналу',
            'name_in_staff_file' => 'ППП',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 5,
        ],
        [
            'name' => 'Відділення ОВП',
            'name_in_staff_file' => 'Від ОВП',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 6,
        ],
        [
            'name' => 'Відділення ППО',
            'name_in_staff_file' => 'Від ППО',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 7,
        ],
        [
            'name' => 'Відділення підготовки',
            'name_in_staff_file' => 'Від підгот',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 8,
        ],
        [
            'name' => 'Служба охорони державної таємниці',
            'name_in_staff_file' => 'СОДТ',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 9,
        ],
        [
            'name' => 'Служба захисту інформації в автоматизованих системах',
            'name_in_staff_file' => 'СЗІвАС',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 10,
        ],
        [
            'name' => 'Служби сил підтримки',
            'name_in_staff_file' => 'ССП',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 11,
        ],
        [
            'name' => 'Служба радіоелектронної та кіберборотьби',
            'name_in_staff_file' => 'СРКБ',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 12,
        ],
        [
            'name' => 'Група безпеки військової служби',
            'name_in_staff_file' => 'ГБВС',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 13,
        ],
        [
            'name' => 'Фінансово-економічна служба',
            'name_in_staff_file' => 'ФЕС',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 14,
        ],
        [
            'name' => 'Медична служба',
            'name_in_staff_file' => 'Мед сл',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 15,
        ],
        [
            'name' => 'Логістика',
            'name_in_staff_file' => 'Логістика',
            'unit_type_id' => UnitType::UNIT_TYPE_CONTROL,
            'rang' => 16,
        ],
        [
            'name' => '1 Механізований батальйон',
            'name_in_staff_file' => '1 МБ',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 17,
        ],
        [
            'name' => '2 Механізований батальйон',
            'name_in_staff_file' => '2 МБ',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 18,
        ],
        [
            'name' => '3 Механізований батальйон',
            'name_in_staff_file' => '3 МБ',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 19,
        ],
        [
            'name' => 'Взвод снайперів',
            'name_in_staff_file' => 'Взв сн',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 20,
        ],
        [
            'name' => 'Танковий батальйон',
            'name_in_staff_file' => 'ТБ',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 21,
        ],
        [
            'name' => '1 Самохідний артилерійський дивізіон',
            'name_in_staff_file' => '1 САДН',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 22,
        ],
        [
            'name' => '2 Самохідний артилерійський дивізіон',
            'name_in_staff_file' => '2 САДН',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 23,
        ],
        [
            'name' => 'Реактивна артилерійська батарея',
            'name_in_staff_file' => 'РАБатр',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 24,
        ],
        [
            'name' => 'Рота протитанкових ракетних комплексів',
            'name_in_staff_file' => 'РПТРК',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 25,
        ],
        [
            'name' => 'Зенітна ракетно-артилерійська батарея',
            'name_in_staff_file' => 'ЗРАБатр',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 26,
        ],
        [
            'name' => 'Рота вогневої підтримки',
            'name_in_staff_file' => 'РВП',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 27,
        ],
        [
            'name' => 'Рота вогневої підтримки',
            'name_in_staff_file' => 'РВП',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 28,
        ],
        [
            'name' => 'Батальйон безпілотних систем',
            'name_in_staff_file' => 'ББС',
            'unit_type_id' => UnitType::UNIT_TYPE_MAIN,
            'rang' => 29,
        ],
        [
            'name' => 'Розвідувальна рота',
            'name_in_staff_file' => 'Розвід рота',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 30,
        ],
        [
            'name' => 'Інженерно-саперна рота',
            'name_in_staff_file' => 'ІСР',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 31,
        ],
        [
            'name' => 'Польовий вузол зв’язку',
            'name_in_staff_file' => 'ПВЗ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 32,
        ],
        [
            'name' => 'Батарея управління та артилерійської розвідки',
            'name_in_staff_file' => 'БУАР',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 33,
        ],
        [
            'name' => 'Рота радіоелектронної боротьби',
            'name_in_staff_file' => 'Рота РЕБ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 34,
        ],
        [
            'name' => 'Відділення управління начальника ППО',
            'name_in_staff_file' => 'ВУНППО',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 35,
        ],
        [
            'name' => 'Взвод РХБЗ',
            'name_in_staff_file' => 'Взв РХБЗ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 36,
        ],
        [
            'name' => 'Медична рота',
            'name_in_staff_file' => 'Мед рота',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 37,
        ],
        [
            'name' => 'Контрольно-технічний пункт',
            'name_in_staff_file' => 'КТП',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 38,
        ],
        [
            'name' => 'Взвод забезпечення',
            'name_in_staff_file' => 'Взвод забезпечення',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 39,
        ],
        [
            'name' => 'Комендантський взвод',
            'name_in_staff_file' => 'Ком взв',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 40,
        ],
        [
            'name' => 'Група контролю бойового стресу',
            'name_in_staff_file' => 'Гр КБС',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 41,
        ],
        [
            'name' => 'Група психологічного супроводу та відновлення',
            'name_in_staff_file' => 'Гр ПСВ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 42,
        ],
        [
            'name' => 'Група інструкторів',
            'name_in_staff_file' => 'ГІ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 43,
        ],
        [
            'name' => 'Ремонтно-відновлювальний батальйон',
            'name_in_staff_file' => 'РВБ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 44,
        ],
        [
            'name' => 'Батальйон матеріального забезпечення',
            'name_in_staff_file' => 'БМЗ',
            'unit_type_id' => UnitType::UNIT_TYPE_SUPPORT,
            'rang' => 45,
        ],
        [
            'name' => '91 запасна рота',
            'name_in_staff_file' => 'запрота',
            'unit_type_id' => UnitType::UNIT_TYPE_OTHER,
            'rang' => 46,
        ],
    ];
    protected array $unitTypes = [];

    public function run(): void
    {
        $this->getUnitTypes();
        foreach (self::UNIT_LIST as $unit) {
            $unit = Unit::createOrFirst(
                ['name' => $unit['name']],
                [
                    'name_in_staff_file' => $unit['name_in_staff_file'],
                    'unit_type_id' => $this->unitTypes[$unit['unit_type_id']],
                    'rang' => $unit['rang'],
                ]
            );
        }
    }

    protected function getUnitTypes(): void
    {
        $unitTypes = UnitType::all();
        foreach ($unitTypes as $unitType) {
            $this->unitTypes[$unitType->name] = $unitType->id;
        }
    }
}
