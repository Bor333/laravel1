<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker;


class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());

    }

    private function getData()
    {
        $data = [
            [
                'title' => 'Спорт',
                'slug' => 'sport',
            ],
            [
                'title' => 'Политика',
                'slug' => 'politics',
            ],
            [
                'title' => 'Covid19',
                'slug' => 'covid',
            ],
        ];

        return $data;
    }
}
