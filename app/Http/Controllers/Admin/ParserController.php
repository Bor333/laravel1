<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Jobs\NewsParsing;
use App\Models\News;
use App\Models\Resources;
use App\Services\XMLParserService;



class ParserController extends Controller
{
    public function index(XMLParserService $parserService)
    {

        $rssLinks = [];
        foreach (Resources::all() as $item) {
            $rssLinks[] = $item->rssLink;
        }

        $start = microtime(true);

        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link);
            //  $parserService->saveNews($link);
        }

        $end = microtime(true);

        dump($end - $start);

        return view('admin.index', [
            'news' => News::all()
        ]);

    }

}
