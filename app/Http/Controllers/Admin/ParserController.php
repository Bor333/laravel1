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

        foreach ($rssLinks as $link) {
            NewsParsing::dispatch($link);
        }
        return redirect()->route('admin.news.index');

    }

}
