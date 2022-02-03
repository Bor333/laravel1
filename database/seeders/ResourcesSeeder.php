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
            ['rssLink' => 'https://news.mail.ru/rss'],
            ['rssLink' => 'https://ngs.ru/rss'],
            ['rssLink' => 'https://iz.ru/xml/rss/all.xml'],
            ['rssLink' => 'https://azcir.org/feed/'],
            ['rssLink' => 'https://russian.rt.com/rss'],
            ['rssLink' => 'http://government.ru/news/rss/'],
            ['rssLink' => 'https://regnum.ru/rss/'],
            ['rssLink' => 'https://www.ng.ru/rss/'],
            ['rssLink' => 'https://lenta.ru/rss/news'],
            ['rssLink' => 'https://vot-tak.tv/feed/'],
            ['rssLink' => 'https://xn--b1aew.xn--p1ai/news/rss'],
            ['rssLink' => 'https://news.yandex.ru/army.rss'],
            ['rssLink' => 'https://news.yandex.ru/auto.rss'],
        ];
        return $data;
    }
}
