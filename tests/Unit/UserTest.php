<?php

namespace Tests\Unit;

use App\Models\Categories;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function test_news()
    {
        $news = new News(new Categories());

        $this->assertIsArray($news->getNews());

    }

    public function test_categories()
    {
        $category = new Categories();

        $this->assertIsArray($category->getCategories());

    }
}
