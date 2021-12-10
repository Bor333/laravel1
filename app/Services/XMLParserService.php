<?php


namespace App\Services;


use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;

class XMLParserService
{
    public function saveNews($link)
    {
        $xml = XMLParser::load($link);

        $data = $xml->parse([
            'title' => ['uses' => 'channel.title'],
            'link' => ['uses' => 'channel.link'],
            'description' => ['uses' => 'channel.description'],
            'news' => ['uses' => 'channel.item[title,link,description,pubDate,enclosure::url,category]'],
        ]);


        foreach ($data['news'] as $news) {
           $category = ($news['category']) ?: 'Прочее';

            Category::query()->firstOrCreate([
                'title' =>  $category,
                'slug' => (str_slug($news['category'])) ?: 'other'
            ]);

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'text' => $news['description'],
                'isPrivate' => 0,
                'image' => $news['enclosure::url'],
                'category_id' => Category::query()->where('title', $category)->value('id'),
            ]);


        }
        return redirect()->route('news.index')->withSuccess('Новости добавлены!');
    }


}
