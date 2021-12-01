<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNewsTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('text', '22')
                ->press('Изменить  новость')
                ->assertSee('Количество символов в поле Текст новости должно быть не меньше 5.');
        });
    }
}
