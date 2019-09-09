<?php

use Illuminate\Database\Seeder;

class ShopProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [];

        $pName = 'Xiaomi Redmi 4X 32GB Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 0,
            'details' => 'Android, экран 5" IPS (720x1280), Qualcomm Snapdragon 435 MSM8940, ОЗУ 3 ГБ, 
            флэш-память 32 ГБ, карты памяти, камера 13 Мп, аккумулятор 4100 мАч, 2 SIM, цвет черный',
            'price' => 387
        ];

        $pName = 'Apple iPhone 7 32GB Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 0,
            'details' => 'Apple iOS, экран 4.7" IPS (750x1334), Apple A10 Fusion, ОЗУ 2 ГБ, 
            флэш-память 32 ГБ, камера 12 Мп, аккумулятор 1960 мАч, 1 SIM, цвет черный',
            'price' => 942
        ];

        $pName = 'Maxvi P11 Silver';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 0,
            'details' => 'экран 2.4" TFT (240x320), ОЗУ 32 Мб, флэш-память 32 Мб, 
            карты памяти, камера 1.3 Мп, аккумулятор 3100 мАч, 3 SIM, цвет серебристый',
            'price' => 65
        ];

        $pName = 'Maxvi C20 Blue';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 0,
            'details' => 'экран 1.77" TFT (128x160), Spreadtrum SC6531DA, ОЗУ 32 Мб, флэш-память 32 Мб, 
            карты памяти, аккумулятор 600 мАч, 2 SIM, цвет синий',
            'price' => 25
        ];

        $pName = 'Samsung Galaxy J1 (2016) Black [J120F]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 0,
            'details' => 'Android, экран 4.5" AMOLED (480x800), Exynos 3475, ОЗУ 1 ГБ, флэш-память 8 ГБ, 
            карты памяти, камера 5 Мп, аккумулятор 2050 мАч, 2 SIM, цвет черный',
            'price' => 189
        ];

        \DB::table('shop_products')->insert($products);
    }
}
