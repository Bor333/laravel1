<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\News;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{

    public function test_news()
    {
        $news = new News(new Category());

        $this->assertIsArray($news->getNews());

    }

    public function test_categories()
    {
        $category = new Category();

        $this->assertIsArray($category->getCategories());

    }
}
