<?php


namespace App\Models;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class News
{
    private Categories $category;

    private $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'slug' => 'novost1',
            'category_id' => 1,
            'isPrivate' => false,

        ],
        2 => [
            'id' => 2,
            'title' => 'Новость 2',
            'text' => 'А тут у нас плохие новости(((',
            'category_id' => 1,
            'isPrivate' => true,
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость 3',
            'text' => 'А у нас новость 3 и не она очень хорошая...',
            'slug' => 'novost1',
            'category_id' => 2,
            'isPrivate' => false,

        ],
        4 => [
            'id' => 4,
            'title' => 'Новость 4',
            'text' => 'А тут у нас еще плохие новости(((',
            'category_id' => 2,
            'isPrivate' => true,
        ]
    ];

    /**
     * News constructor.
     * @param Categories $category
     */
    public function __construct(Categories $category)
    {
        $this->category = $category;
    }


    public function getNews()
    {
        $arr = File::get(storage_path() . '/json.txt');
        return json_decode($arr, true);

    }

    public function getNewsByCategorySlug($slug) {
        $id = $this->category->getCategoryIdBySlug($slug);
        return $this->getNewsByCategoryId($id);
    }

    public function getNewsByCategoryId($id) {
        $news = [];
        foreach ($this->getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public function getNewsById($id)
    {
        return $this->getNews()[$id] ?? [];
    }

}
