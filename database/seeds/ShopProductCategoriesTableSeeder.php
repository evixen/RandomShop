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
            'parent_id' => 0,
            'menu_level' => 1
        ];

        $cName = 'Бытовая техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0,
            'menu_level' => 1
        ];

        $cName = 'Компьютеры и сети';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 0,
            'menu_level' => 1
        ];


        // 4
        $cName = 'Телефония и связь';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1,
            'menu_level' => 2
        ];

        $cName = 'Мобильные телефоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 4,
            'menu_level' => 3
        ];

        $cName = 'Проводные телефоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 4,
            'menu_level' => 3
        ];

        // 7
        $cName = 'Аудиотехника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1,
            'menu_level' => 2
        ];

        $cName = 'MP3-плееры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 7,
            'menu_level' => 3
        ];

        $cName = 'Микрофоны';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 7,
            'menu_level' => 3
        ];

        // 10
        $cName = 'Телевидение и видео';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 1,
            'menu_level' => 2
        ];

        $cName = 'Телевизоры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 10,
            'menu_level' => 3
        ];

        $cName = 'Медиаплееры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 10,
            'menu_level' => 3
        ];

        // 13
        $cName = 'Климатическая техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2,
            'menu_level' => 2
        ];

        $cName = 'Вентиляторы';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 13,
            'menu_level' => 3
        ];

        $cName = 'Обогреватели';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 13,
            'menu_level' => 3
        ];

        // 16
        $cName = 'Крупногабаритная техника';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2,
            'menu_level' => 2
        ];

        $cName = 'Кухонные плиты';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 16,
            'menu_level' => 3
        ];

        $cName = 'Холодильники';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 16,
            'menu_level' => 3
        ];

        // 19
        $cName = 'Подготовка и обработка продуктов';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 2,
            'menu_level' => 2
        ];

        $cName = 'Блендеры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 19,
            'menu_level' => 3
        ];

        $cName = 'Кухонные весы';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 19,
            'menu_level' => 3
        ];

        // 22
        $cName = 'Ноутбуки и аксессуары';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3,
            'menu_level' => 2
        ];

        $cName = 'Ноутбуки';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 22,
            'menu_level' => 3
        ];

        $cName = 'Сумки для ноутбуков';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 22,
            'menu_level' => 3
        ];

        // 25
        $cName = 'Компьютеры и комплектующие';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3,
            'menu_level' => 2
        ];

        $cName = 'Видеокарты';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 25,
            'menu_level' => 3
        ];

        $cName = 'Жесткие диски';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 25,
            'menu_level' => 3
        ];

        // 28
        $cName = 'Периферия';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 3,
            'menu_level' => 2
        ];

        $cName = 'Клавиатуры';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 28,
            'menu_level' => 3
        ];

        $cName = 'Мыши';
        $categories[] = [
            'title' => $cName,
            'slug' => Str::slug($cName),
            'parent_id' => 28,
            'menu_level' => 3
        ];


        \DB::table('shop_product_categories')->insert($categories);
    }
}
