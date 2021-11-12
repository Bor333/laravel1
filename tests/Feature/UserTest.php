<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_index_exist()
    {
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/news/one/{id}');
        $response->assertStatus(200);

        $response = $this->get('/news/categories/');
        $response->assertStatus(200);

        $response = $this->get('/news/categories/{slug}');
        $response->assertStatus(200);

        $response = $this->get('/admin/');
        $response->assertStatus(200);

        $response = $this->get('/admin/test1');
        $response->assertStatus(200);

        $response = $this->get('/admin/test2');
        $response->assertStatus(200);

        $response = $this->get('/admin/create');
        $response->assertStatus(200);
    }



    public function test_index_template()
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

        $view = $this->view('index', ['text' => 'Главная']);
        $view->assertSee('Главная');

        $view = $this->view('news/index', ['header' => 'Новости']);
        $view->assertSee('Новости');

        $view = $this->view('news/categories', [
            'sport' => 'Спорт',
            'politics' => 'Политика',
            'covid' => 'Covid19',
        ]);
        $view->assertSee('Спорт');
        $view->assertSee('Политика');
        $view->assertSee('Covid19');

        $view = $this->view('news/category', ['header' => 'Новости категории']);
        $view->assertSee('Новости категории');

        $view = $this->view('about', ['name' => 'О сайте']);
        $view->assertSee('О сайте');


    }
}
