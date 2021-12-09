<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Orchestra\Parser\Xml\Facade as XmlParser;


class ParserController extends Controller
{
    public function index()
    {

        $xml = XMLParser::load('https://lenta.ru/rss');

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);
        $i = 0;

        foreach ($data['news'] as $news) {

            Category::query()->firstOrCreate([
                'title' => $news['category'],
                'slug' => str_slug($news['category'])
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'isPrivate' => 0,
                'image' => $news['enclosure::url'],
                'category_id' => Category::query()->where('title', $news['category'])->value('id'),
            ]);


   //         $i++;
   //        if ($i == 10) break;
        }
        return redirect()->route('news.index')->withSuccess('Новости добавлены!');
    }
}
