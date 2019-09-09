<?php

use Illuminate\Database\Seeder;

class ShopProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Электроника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0
        ];

        $cName = 'Бытовая техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0
        ];

        $cName = 'Компьютеры и сети';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0
        ];

        // 4
        $cName = 'Телефония и связь';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1
        ];

        $cName = 'Мобильные телефоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 4
        ];

        $cName = 'Проводные телефоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 4
        ];

        // 7
        $cName = 'Аудиотехника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1
        ];

        $cName = 'MP3-плееры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 7
        ];

        $cName = 'Микрофоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 7
        ];

        // 10
        $cName = 'Телевидение и видео';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1
        ];

        $cName = 'Телевизоры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 10
        ];

        $cName = 'Медиаплееры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 10
        ];

        // 13
        $cName = 'Климатическая техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2
        ];

        $cName = 'Вентиляторы';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 13
        ];

        $cName = 'Обогреватели';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 13
        ];

        // 16
        $cName = 'Крупногабаритная техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2
        ];

        $cName = 'Кухонные плиты';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 16
        ];

        $cName = 'Холодильники';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 16
        ];

        // 19
        $cName = 'Подготовка и обработка продуктов';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2
        ];

        $cName = 'Блендеры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 19
        ];

        $cName = 'Кухонные весы';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 19
        ];

        // 22
        $cName = 'Ноутбуки';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3
        ];

        $cName = 'Ноубуки';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 22
        ];

        $cName = 'Сумки для ноутбуков';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 22
        ];

        // 25
        $cName = 'Компьютеры и комплектующие';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3
        ];

        $cName = 'Видеокарты';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 25
        ];

        $cName = 'Жесткие диски';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 25
        ];

        // 28
        $cName = 'Периферия';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3
        ];

        $cName = 'Клавиатуры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 28
        ];

        $cName = 'Мыши';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 28
        ];

        \DB::table('shop_product_categories')->insert($categories);
    }
}
