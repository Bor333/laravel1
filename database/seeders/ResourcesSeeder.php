<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('resources')->insert($this->getData());

    }

    private function getData()
    {
        $data = [
            ['rssLink' => 'https://news.yandex.ru/army.rss'],
            ['rssLink' =>'https://news.yandex.ru/auto.rss'],
            ['rssLink' =>'https://lenta.ru/rss/news'],
        ];
        return $data;
    }
}
