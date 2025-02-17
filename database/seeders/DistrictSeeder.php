<?php

namespace Database\Seeders;

use App\Models\Districts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $list = file_get_contents(database_path('seeders/dictionaries/districts.json'));

        foreach (json_decode($list, true) as $district) {
            $data = [
                'id'        => $district['id'],
                'region_id' => $district['region_id'],
                'name_uz'   => $district['name_uz'],
                'name_ru'   => $district['name_ru'],
            ];
            Districts::updateOrCreate($data);
        }
    }
}
