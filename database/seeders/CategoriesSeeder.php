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

    private  function getData() {
        $data = [];
        $faker = Faker\Factory::create('ru_RU');
        for ($i = 0; $i <= 10; $i++) {
            $data[] = [
                'title' => $faker->realText(10),
                'slug' => $faker->realText(10),
            ];
        }
        return $data;
    }
}
