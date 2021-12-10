<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\News;
use App\Services\XMLParserService;



class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {
        $rssLinks = [
            'https://news.yandex.ru/auto.rss',
            'https://lenta.ru/rss/news',
            ];

        $start = microtime(true);

        foreach ($rssLinks as $link) {
            $parserService->saveNews($link);
        }

        $end = microtime(true);

        dump($end - $start);

        return view('admin.index', [
            'news' => News::all()
        ]);

    }

}
