<?php


namespace App\Models;


class Category
{
    private $category = [
        [
            'id' => 1,
            'name' => 'Политика',
            'text' => 'А у нас новость 1 и она очень хорошая!',
        ],
        [
            'id' => 2,
            'name' => 'Спорт',
            'text' => 'А тут у нас плохие новости((('
        ]
    ];

    public function getCategory() {
        return $this->category;
    }

}
