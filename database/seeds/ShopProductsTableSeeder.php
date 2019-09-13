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
            'category_id' => 5,
            'details' => 'Android, экран 5" IPS (720x1280), Qualcomm Snapdragon 435 MSM8940, ОЗУ 3 ГБ, 
            флэш-память 32 ГБ, карты памяти, камера 13 Мп, аккумулятор 4100 мАч, 2 SIM, цвет черный',
            'price' => 387
        ];

        $pName = 'Apple iPhone 7 32GB Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 5,
            'details' => 'Apple iOS, экран 4.7" IPS (750x1334), Apple A10 Fusion, ОЗУ 2 ГБ, 
            флэш-память 32 ГБ, камера 12 Мп, аккумулятор 1960 мАч, 1 SIM, цвет черный',
            'price' => 942
        ];

        $pName = 'Maxvi P11 Silver';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 5,
            'details' => 'экран 2.4" TFT (240x320), ОЗУ 32 Мб, флэш-память 32 Мб, 
            карты памяти, камера 1.3 Мп, аккумулятор 3100 мАч, 3 SIM, цвет серебристый',
            'price' => 65
        ];

        $pName = 'Maxvi C20 Blue';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 5,
            'details' => 'экран 1.77" TFT (128x160), Spreadtrum SC6531DA, ОЗУ 32 Мб, флэш-память 32 Мб, 
            карты памяти, аккумулятор 600 мАч, 2 SIM, цвет синий',
            'price' => 25
        ];

        $pName = 'Samsung Galaxy J1 (2016) Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 5,
            'details' => 'Android, экран 4.5" AMOLED (480x800), Exynos 3475, ОЗУ 1 ГБ, флэш-память 8 ГБ, 
            карты памяти, камера 5 Мп, аккумулятор 2050 мАч, 2 SIM, цвет черный',
            'price' => 189
        ];


        $pName = 'TeXet TX-212';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 6,
            'details' => 'Возможность монтажа на стену; регулировка громкости; повторный набор; отключение микрофона',
            'price' => 14.20
        ];

        $pName = 'Ritmix RT-320';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 6,
            'details' => 'Возможность монтажа на стену; регулировка громкости; удержание вызова; повторный набор',
            'price' => 18
        ];

        $pName = 'Gigaset DA210';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 6,
            'details' => 'Возможность монтажа на стену; регулировка громкости; удержание вызова; повторный набор',
            'price' => 36.70
        ];

        $pName = 'D-Link DPH-120SE';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 6,
            'details' => 'Возможность монтажа на стену; регулировка громкости; удержание вызова; повторный набор',
            'price' => 106.60
        ];

        $pName = 'Grandstream GXV3240';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 6,
            'details' => 'Возможность монтажа на стену; регулировка громкости; удержание вызова; повторный набор',
            'price' => 459.30
        ];


        $pName = 'FiiO X1 II Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 8,
            'details' => 'выходная мощность 90 мВт (при 16 Ом), 5—60000 Гц TFT 320 x 240, поддержка карт памяти, BT',
            'price' => 259
        ];

        $pName = 'Perfeo I-Sonic VI-M011 Black';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 8,
            'details' => '20—20000 Гц, экран 1.8" TFT, поддержка карт памяти, радио, время работы 10 часов',
            'price' => 33.30
        ];

        $pName = 'Sony NW-E394 Red';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 8,
            'details' => 'экран 1.77" TFT 128 x 160, радио, время работы 1 сутки 11 часов',
            'price' => 164
        ];

        $pName = 'Ritmix RF-1010 Yellow';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 8,
            'details' => '20—20000 Гц, поддержка карт памяти',
            'price' => 13
        ];

        $pName = 'Sony NWZ-B183F 4GB Red';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 8,
            'details' => 'экран 0.9" OLED 128 x 36, радио, время работы 20 часов',
            'price' => 112.20
        ];


        $pName = 'SVEN MK-200';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 9,
            'details' => 'конденсаторный, настольный/"гусиная шея", направленность круговая, 50-16000 Гц, разъем 3.5 мм',
            'price' => 6.70
        ];

        $pName = 'SVEN MK-150';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 9,
            'details' => 'конденсаторный, петличный, направленность круговая, 50-16000 Гц, разъем 3.5 мм',
            'price' => 4
        ];

        $pName = 'BBK CM215 (Black+Silver)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 9,
            'details' => 'динамический, ручной, направленность кардиоидная, 50-17000 Гц',
            'price' => 12.25
        ];

        $pName = 'Ritmix RWM-221';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 9,
            'details' => 'динамический, ручной, беспроводной, направленность кардиоидная, 40-20000 Гц, разъем 6.3 мм',
            'price' => 140
        ];

        $pName = 'A4Tech MI-10';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 9,
            'details' => 'конденсаторный, настольный/"гусиная шея", направленность круговая, разъем 3.5 мм',
            'price' => 12.80
        ];


        $pName = 'LG 24MT49S-PZ';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 11,
            'details' => '24" 1366x768 (HD), матрица VA, частота матрицы 50 Гц, Smart TV (LG webOS), Wi-Fi',
            'price' => 454
        ];

        $pName = 'Samsung UE32J5205AK';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 11,
            'details' => '32" 1920x1080 (Full HD), частота матрицы 50 Гц,
             индекс динамичных сцен 200, Smart TV (Samsung Smart Hub), Wi-Fi',
            'price' => 705.30
        ];

        $pName = 'Harper 32R660TS';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 11,
            'details' => '32" 1366x768 (HD), Smart TV (Android), Wi-Fi',
            'price' => 334
        ];

        $pName = 'TELEFUNKEN TF-LED32S52T2S';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 11,
            'details' => '32" 1366x768 (HD), матрица VA, частота матрицы 50 Гц, Smart TV (Android), Wi-Fi',
            'price' => 319.30
        ];

        $pName = 'Mystery MTV-3229LTA2';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 11,
            'details' => '32" 1366x768 (HD), матрица VA, Smart TV (Android), Wi-Fi',
            'price' => 499
        ];


        $pName = 'Invin KM5';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 12,
            'details' => 'USB, Smart TV, Wi-Fi, LAN, 4K',
            'price' => 136.70
        ];

        $pName = 'SpinetiX HMP130';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 12,
            'details' => 'USB, Smart TV, Wi-Fi, LAN, 4K',
            'price' => 298
        ];

        $pName = 'Apple TV 32GB';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 12,
            'details' => 'Smart TV, Wi-Fi, LAN, 1080p',
            'price' => 405
        ];

        $pName = 'iconBIT XDS104K';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 12,
            'details' => 'USB, карты памяти microSD, Smart TV, Wi-Fi, LAN, 4K',
            'price' => 126.20
        ];

        $pName = 'Invin X2';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 12,
            'details' => 'USB, карты памяти SD/MMC, Smart TV, Wi-Fi, LAN, 4K',
            'price' => 123
        ];


        $pName = 'Scarlett SC-SF111RC04';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 14,
            'details' => 'осевой, напольный, мощность 45 Вт, 3 скорости, 
            управление электронное, таймер, пульт ДУ, лопасти 40 см, питание: сеть',
            'price' => 103
        ];

        $pName = 'Aresa AR-1301';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 14,
            'details' => 'осевой, напольный, мощность 40 Вт, 3 скорости, 
            управление механическое, лопасти 40 см, питание: сеть',
            'price' => 51.20
        ];

        $pName = 'Scarlett SC-1371';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 14,
            'details' => 'осевой, напольный, мощность 35 Вт, 3 скорости, управление
             механическое, лопасти 30 см, питание: сеть',
            'price' => 45.80
        ];

        $pName = 'Maxwell MW-3545 W';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 14,
            'details' => 'осевой, напольный, мощность 40 Вт, 3 скорости, управление 
            механическое, таймер, пульт ДУ, лопасти 40 см, питание: сеть',
            'price' => 61.20
        ];

        $pName = 'Mystery MSF-2402';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 14,
            'details' => 'осевой, напольный, мощность 45 Вт, 3 скорости, управление механическое, питание: сеть',
            'price' => 34
        ];


        \DB::table('shop_products')->insert($products);
    }
}
