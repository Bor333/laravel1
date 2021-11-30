<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
/*
    public function test_exist_home()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    public function test_exist_news()
    {
        $response = $this->get('/news/');
        $response->assertStatus(200);
    }

    public function test_exist_one()
    {
        $response = $this->get('/news/one/{id}');
        $response->assertStatus(200);
    }

    public function test_exist_categories()
    {
        $response = $this->get('/news/categories/');
        $response->assertStatus(200);
    }

    public function test_exist_category()
    {
        $response = $this->get('/news/categories/{slug}');
        $response->assertStatus(200);
    }

    public function test_exist_admin()
    {
        $response = $this->get('/admin/');
        $response->assertStatus(200);
    }

    public function test_exist_test1()
    {
        $response = $this->get('/admin/test1');
        $response->assertStatus(200);
    }

    public function test_exist_test2()
    {
        $response = $this->get('/admin/test2');
        $response->assertStatus(200);
    }

    public function test_exist_create()
    {
        $response = $this->get('/admin/create');
        $response->assertStatus(200);
    }


    public function test_menu_template()
    {
        $view = $this->view('menu', [
            'home' => 'Главная',
            'news' => 'Новости',
            'categories' => 'Категории',
            'about' => 'О нас',
            'admin' => 'Админка'
        ]);
        $view->assertSee('Главная');
        $view->assertSee('Новости');
        $view->assertSee('Категории');
        $view->assertSee('О нас');
        $view->assertSee('Главная');
    }

    public function test_template_home()
    {
        $view = $this->view('index', ['text' => 'Главная']);
        $view->assertSee('Главная');
    }


    public function test_template_news()
    {
        $view = $this->view('news/index', ['header' => 'Новости']);
        $view->assertSee('Новости');
    }

    public function test_template_categories()
    {
        $view = $this->view('news/categories', [
            'sport' => 'Спорт',
            'politics' => 'Политика',
            'covid' => 'Covid19',
        ]);
        $view->assertSee('Спорт');
        $view->assertSee('Политика');
        $view->assertSee('Covid19');
    }

    public function test_template_category()
    {
        $view = $this->view('news/category', ['header' => 'Новости категории']);
        $view->assertSee('Новости категории');

        $view = $this->view('about', ['name' => 'О сайте']);
        $view->assertSee('О сайте');


    }
*/

}
