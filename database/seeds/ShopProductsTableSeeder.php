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


        // Обогреватели

        $pName = 'Ballu Classic BOH/CL-09WRN 2000';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 15,
            'details' => 'масляный радиатор, 2000 Вт, термостат, управление механическое',
            'price' => 80.30
        ];

        $pName = 'Ballu BEP/EXT-2000';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 15,
            'details' => 'конвектор, 2000 Вт, термостат, крепление на стену, управление электронное',
            'price' => 200.50
        ];

        $pName = 'Neoclima Shaft-2.0';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 15,
            'details' => 'инфракрасный, кварцевый, 2000 Вт, термостат, крепление на стену, управление механическое',
            'price' => 87.85
        ];

        $pName = 'ST-HT7645K (White)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 15,
            'details' => 'тепловентилятор, 2000 Вт, термостат, управление механическое',
            'price' => 39
        ];

        $pName = 'Zenet NSKT-90C';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 15,
            'details' => 'инфракрасный, карбоновый, 1200 Вт, управление механическое',
            'price' => 126.60
        ];


        // Кухонные плиты

        $pName = 'GEFEST 3200-06 К62';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 17,
            'details' => 'газовая панель + газовый духовой шкаф, поверхность: нержавеющая сталь,
             крышка из закалённого стекла, управление механическое, без таймера, размеры (ШхГхВ): 50x57x85 см,
              цвет нержавеющая сталь',
            'price' => 421.60
        ];

        $pName = 'CEZARIS ПГ 2100-08';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 17,
            'details' => 'газовая панель + газовый духовой шкаф, поверхность: эмалированная сталь,
             крышка из эмалированной стали, управление механическое, таймер механический, размеры (ШхГхВ): 50x50x85 см,
              цвет белый',
            'price' => 314.40
        ];

        $pName = 'CEZARIS ПГ 2100-00 К';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 17,
            'details' => 'газовая панель + газовый духовой шкаф, поверхность: эмалированная сталь, щиток,
             управление механическое, без таймера, размеры (ШхГхВ): 50x55x85 см, цвет коричневый',
            'price' => 251.30
        ];

        $pName = 'GEFEST 1200 С7 К8';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 17,
            'details' => 'газовая панель + газовый духовой шкаф, поверхность: эмалированная сталь,
             крышка из эмалированной стали, управление механическое, без таймера,
              размеры (ШхГхВ): 60x60x85 см, цвет белый',
            'price' => 328
        ];

        $pName = 'GEFEST 6500-04 0069';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 17,
            'details' => 'газовая панель + газовый духовой шкаф, газ-контроль конфорок,
             поверхность: закаленное стекло, управление электронное, таймер электронный,
              размеры (ШхГхВ): 60x60x85 см, цвет черный',
            'price' => 791
        ];



        // Холодильники

        $pName = 'Samsung RB33J3420BC';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 18,
            'details' => 'полный No Frost, электронное управление, класс A+, полезный объём: 328 л (230 + 98 л),
             инверторный компрессор, 59.5x66.8x185 см, черный',
            'price' => 1145
        ];

        $pName = 'ATLANT М 7204-100';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 18,
            'details' => 'без No Frost, механическое управление, класс A+,
             полезный объём: 227 л, 59.5x62.5x176.8 см, белый',
            'price' => 625.70
        ];

        $pName = 'BEKO RFNK290E23W';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 18,
            'details' => 'No Frost (морозильная камера), электронное управление, класс A+, полезный объём: 255 л, белый',
            'price' => 748
        ];

        $pName = 'Hotpoint-Ariston E4D AA X C';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 18,
            'details' => 'полный No Frost, электронное управление, класс A+, полезный объём: 402 л (292 + 110 л),
             70x76x195.5 см, нержавеющая сталь',
            'price' => 1594
        ];

        $pName = 'Gorenje FN6192PB';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 18,
            'details' => 'No Frost (морозильная камера), электронное управление, класс A++, полезный объём: 243 л,
             60x64x185 см, черный',
            'price' => 1357
        ];



        // Блендеры

        $pName = 'Maxwell MW-1169 W';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 20,
            'details' => '500 Вт, 2 скорости',
            'price' => 67.60
        ];

        $pName = 'Scarlett SC-HB42F20';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 20,
            'details' => '700 Вт, 2 скорости',
            'price' => 49.60
        ];

        $pName = 'Bosch MSM 6B250';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 20,
            'details' => '300 Вт, 1 скорость',
            'price' => 49.30
        ];

        $pName = 'Polaris PHB 0837A';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 20,
            'details' => '850 Вт, 2 скорости',
            'price' => 106.40
        ];

        $pName = 'Aresa AR-1703';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 20,
            'details' => '1000 Вт, 2 скорости, плавная регулировка скорости',
            'price' => 118
        ];



        // Кухонные весы

        $pName = 'Aresa SK-406';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 21,
            'details' => 'электронные, настольные с чашей, чаша: 5 л, нагрузка: 5 кг, деление: 1 г, дисплей LCD,
             функция довешивания, дополнительно: индикация заряда батареи/индикация перегрузки',
            'price' => 27.40
        ];

        $pName = 'Beurer KS25';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 21,
            'details' => 'электронные, настольные с чашей, нагрузка: 3 кг, деление: 1 г, дисплей LCD/с подсветкой,
             функция довешивания, дополнительно: индикация перегрузки',
            'price' => 39
        ];

        $pName = 'Tefal LK2000V0';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 21,
            'details' => 'электронные, безмен, нагрузка: 40 кг, деление: 50 г, дисплей LCD',
            'price' => 40.60
        ];

        $pName = 'Atlanta ATH-6181';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 21,
            'details' => 'электронные, настольные, нагрузка: 5 кг, деление: 1 г, дисплей LCD, функция довешивания,
             дополнительно: индикация заряда батареи',
            'price' => 25.20
        ];

        $pName = 'Redmond RS-M723';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 21,
            'details' => 'электронные, настольные, нагрузка: 5 кг, деление: 1 г, дисплей LCD, функция довешивания,
             дополнительно: индикация заряда батареи/индикация перегрузки/объем жидкостей',
            'price' => 33.90
        ];



        // Ноутбуки

        $pName = 'ASUS VivoBook Pro N752VX-GC218T';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 23,
            'details' => '17.3" 1920 x 1080, Intel Core i5 6300HQ 2300 МГц, 4 ГБ, 1000 ГБ (HDD),
             NVIDIA GeForce GTX 950M, Windows 10, цвет крышки темно-серый, цвет корпуса серебристый',
            'price' => 1930
        ];

        $pName = 'Acer TravelMate P259-MG-5317 [NX.VE2ER.010]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 23,
            'details' => '15.6" 1920 x 1080, Intel Core i5 6200U 2300 МГц, 6 ГБ, HDD 1000 ГБ,
             граф. адаптер: NVIDIA GeForce 940MX 2 ГБ, Linux, DVD, цвет крышки черный',
            'price' => 1380.40
        ];

        $pName = 'ASUS VivoBook X540YA-XO047D';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 23,
            'details' => '15.6" 1366 x 768, AMD E1 7010 1500 МГц, 2 ГБ, HDD 500 ГБ, граф. адаптер: встроенный,
             без ОС, цвет крышки темно-коричневый',
            'price' => 436
        ];

        $pName = 'HP 15-bw058ur [2CQ06EA]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 23,
            'details' => '15.6" 1366 x 768 TN+Film, AMD A6 9220 2500 МГц, 4 ГБ, HDD 500 ГБ, граф. адаптер: встроенный,
             без ОС, цвет крышки черный',
            'price' => 588.30
        ];

        $pName = 'Apple MacBook Air 13" (2017 год) [MQD32]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 23,
            'details' => '13.3" 1440 x 900 TN+Film, Intel Core i5 5350U 1800 МГц, 8 ГБ, SSD 128 ГБ,
             граф. адаптер: встроенный, Mac OS, цвет крышки серебристый',
            'price' => 2006.80
        ];



        // Сумки для ноутбуков

        $pName = 'Versado 303';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 24,
            'details' => 'портфель для ноутбука 15.6", нейлон, цвет черный',
            'price' => 23
        ];

        $pName = 'PC Pet Nylon 15.6"(PCP-SL9015N)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 24,
            'details' => 'умка для ноутбука 15.6", нейлон, цвет черный',
            'price' => 35.50
        ];

        $pName = 'HP Essential Messenger (H1D25AA)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 24,
            'details' => 'сумка для ноутбука 17.3", нейлон, цвет черный',
            'price' => 76.30
        ];

        $pName = 'Piquadro Blue Square (CA2849B2/BLU2)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 24,
            'details' => 'сумка для ноутбука 15", натуральная кожа, цвет синий',
            'price' => 1571.80
        ];

        $pName = 'Envy Grounds G092';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 24,
            'details' => 'сумка для ноутбука 15.6", нейлон, цвет серый',
            'price' => 26.60
        ];



        // Видеокарты

        $pName = 'MSI Geforce GTX 1050 Ti Gaming X 4GB GDDR5';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 26,
            'details' => 'частота ядра 1354 МГц/1468 МГц, частота памяти 1752 МГц, 128 бит, 6 pin, DVI,
             HDMI, DisplayPort',
            'price' => 330
        ];

        $pName = 'Palit GeForce GTX 1060 JetStream 6GB GDDR5 [NE51060015J9-1060J]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 26,
            'details' => 'частота ядра 1506 МГц/1708 МГц, 1280sp, частота памяти 2000 МГц, 192 бит, 6 pin,
             2.5 слота, DVI, HDMI, DisplayPort',
            'price' => 725.30
        ];

        $pName = 'Palit GeForce GTX 1050 Ti StormX 4GB GDDR5 [NE5105T018G1-1070F]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 26,
            'details' => 'частота ядра 1290 МГц/1392 МГц, 768sp, частота памяти 1750 МГц, 128 бит,
             2 слота, DVI, HDMI, DisplayPort',
            'price' => 288.80
        ];

        $pName = 'Gigabyte GeForce GTX 1060 G1 Gaming 6GB GDDR5 (rev.1.0)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 26,
            'details' => 'частота ядра 1594 МГц/1809 МГц, частота памяти 2002 МГц, 192 бит, 8 pin,
             2 слота, DVI, HDMI, DisplayPort',
            'price' => 542
        ];

        $pName = 'ASUS GeForce GTX 1060 3GB GDDR5 [DUAL-GTX1060-O3G]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 26,
            'details' => 'частота ядра 1569 МГц/1785 МГц, 1152sp, частота памяти 2002 МГц, 192 бит, 6 pin, 2 слота,
             DVI, HDMI, DisplayPort',
            'price' => 476.30
        ];



        // Жеские диски

        $pName = 'WD Caviar Blue 1TB (WD10EZEX)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 27,
            'details' => '3.5", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 МБ, линейная скорость 150/150 МБ/с',
            'price' => 81.40
        ];

        $pName = 'Seagate BarraCuda 1TB [ST1000DM010]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 27,
            'details' => '3.5", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 МБ',
            'price' => 78.50
        ];

        $pName = 'Toshiba P300 1TB [HDWD110UZSVA]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 27,
            'details' => '3.5", SATA 3.0 (6Gbps), 7200 об/мин, буфер 64 МБ',
            'price' => 78.10
        ];

        $pName = 'WD Blue 2TB (WD20EZRZ)';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 27,
            'details' => '3.5", SATA 3.0 (6Gbps), 5400 об/мин, буфер 64 МБ, линейная скорость 147/147 МБ/с',
            'price' => 116.80
        ];

        $pName = 'WD Black 500GB WD5000LPLX';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 27,
            'details' => '2.5", SATA 3.0 (6Gbps), 7200 об/мин, буфер 32 МБ',
            'price' => 99
        ];


        // Клавиатуры

        $pName = 'Gembird KB-G11L';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 29,
            'details' => 'игровая для ПК, USB, подсветка, цвет черный',
            'price' => 30.30
        ];

        $pName = 'A4Tech Bloody B328';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 29,
            'details' => 'игровая механическая для ПК, USB, подсветка, цвет черный',
            'price' => 65
        ];

        $pName = 'A4Tech Bloody Q100';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 29,
            'details' => 'игровая для ПК, USB, влагозащита, цвет черный',
            'price' => 32.70
        ];

        $pName = 'Oklick 760G Genesis [381063]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 29,
            'details' => 'игровая для ПК, USB, подсветка, цвет черный',
            'price' => 25.20
        ];

        $pName = 'Defender Doom Keeper GK-100DL';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 29,
            'details' => 'игровая для ПК, USB, подсветка, влагозащита, цвет черный',
            'price' => 27.40
        ];



        // Мыши

        $pName = 'Logitech G102 Prodigy [910-004939]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 30,
            'details' => 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 8000 dpi,
             6 кнопок, колесо с нажатием, цвет черный',
            'price' => 47
        ];

        $pName = 'A4Tech Bloody V7M';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 30,
            'details' => 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 3200 dpi,
             8 кнопок, колесо с нажатием, цвет черный',
            'price' => 34.50
        ];

        $pName = 'Oklick 765G Symbiont [945841]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 30,
            'details' => 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 2400 dpi,
             6 кнопок, колесо с нажатием, цвет черный',
            'price' => 19.20
        ];

        $pName = 'Logitech G403 Prodigy [910-004824]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 30,
            'details' => 'полноразмерная игровая мышь для ПК, проводная, USB, сенсор оптический 12000 dpi, 6 кнопок,
             колесо с нажатием, цвет черный',
            'price' => 137.60
        ];

        $pName = 'SmartBuy 706AGG [SBM-706AGG-K]';
        $products[] = [
            'name' => $pName,
            'slug' => Str::slug($pName),
            'category_id' => 30,
            'details' => 'ноутбучная игровая мышь для ПК, радио, сенсор лазерный 2400 dpi,
             6 кнопок, колесо с нажатием, цвет черный',
            'price' => 27.50
        ];



        \DB::table('shop_products')->insert($products);
    }
}
