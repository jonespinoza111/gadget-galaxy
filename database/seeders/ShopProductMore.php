<?php

namespace Database\Seeders;

use App\Models\ShopProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShopProductMore extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $cameras = [
            [
                'category_id' => 9,
                'name' => 'Sony Alpha a7 III Mirrorless Camera',
                'slug' => 'sony-alpha-a7-iii-mirrorless-camera',
                'brand' => 'Sony',
                'small_description' => 'Versatile full-frame mirrorless camera for professional photography and videography.',
                'description' => 'Experience versatility and performance with the Sony Alpha a7 III Mirrorless Camera. This full-frame mirrorless camera offers high-quality imaging, fast performance, and advanced features for professional photographers and videographers.',
                'original_price' => 2500,
                'selling_price' => 2300,
                'quantity' => 25,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Sony Alpha a7 III - Mirrorless Camera',
                'meta_keyword' => 'Sony Alpha a7 III, Mirrorless Camera, Sony, Full-frame mirrorless camera',
                'meta_description' => 'Unleash your creativity with the versatile Sony Alpha a7 III Mirrorless Camera for professional photography and videography.'
            ],
            [
                'category_id' => 9,
                'name' => 'Canon EOS 5D Mark IV DSLR Camera',
                'slug' => 'canon-eos-5d-mark-iv-dslr-camera',
                'brand' => 'Canon',
                'small_description' => 'High-performance full-frame DSLR camera for professional photographers and filmmakers.',
                'description' => 'Elevate your photography and filmmaking with the Canon EOS 5D Mark IV DSLR Camera. This high-performance full-frame DSLR camera delivers exceptional still and 4K video capabilities, making it an ideal choice for professional photographers and filmmakers.',
                'original_price' => 3200,
                'selling_price' => 3000,
                'quantity' => 18,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Canon EOS 5D Mark IV - DSLR Camera',
                'meta_keyword' => 'Canon EOS 5D Mark IV, DSLR Camera, Canon, Full-frame camera',
                'meta_description' => 'Capture exceptional stills and 4K videos with the high-performance Canon EOS 5D Mark IV DSLR Camera for professional photographers and filmmakers.'
            ],
            [
                'category_id' => 9,
                'name' => 'Panasonic Lumix GH5S Mirrorless Camera',
                'slug' => 'panasonic-lumix-gh5s-mirrorless-camera',
                'brand' => 'Panasonic',
                'small_description' => 'Professional mirrorless camera for high-quality video production and photography.',
                'description' => 'Unleash your creative vision with the Panasonic Lumix GH5S Mirrorless Camera. Designed for professional video production and photography, this mirrorless camera offers exceptional low-light performance, 4K video recording, and advanced imaging capabilities.',
                'original_price' => 2800,
                'selling_price' => 2600,
                'quantity' => 22,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Panasonic Lumix GH5S - Mirrorless Camera',
                'meta_keyword' => 'Panasonic Lumix GH5S, Mirrorless Camera, Panasonic, Professional mirrorless camera',
                'meta_description' => 'Capture high-quality videos and photos with the professional Panasonic Lumix GH5S Mirrorless Camera designed for professional video production and photography.'
            ],
            [
                'category_id' => 9,
                'name' => 'Fujifilm X-T4 Mirrorless Camera',
                'slug' => 'fujifilm-x-t4-mirrorless-camera',
                'brand' => 'Fujifilm',
                'small_description' => 'Versatile mirrorless camera for photography and videography enthusiasts.',
                'description' => 'Experience versatility and performance with the Fujifilm X-T4 Mirrorless Camera. This versatile mirrorless camera offers advanced features, in-body image stabilization, and high-quality imaging for photography and videography enthusiasts.',
                'original_price' => 2000,
                'selling_price' => 1800,
                'quantity' => 28,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Fujifilm X-T4 - Mirrorless Camera',
                'meta_keyword' => 'Fujifilm X-T4, Mirrorless Camera, Fujifilm, Versatile mirrorless camera',
                'meta_description' => 'Unleash your creativity with the versatile Fujifilm X-T4 Mirrorless Camera designed for photography and videography enthusiasts.'
            ]
        ];

        $laptops = [
            [
                'category_id' => 11,
                'name' => 'Dell XPS 13 Ultrabook',
                'slug' => 'dell-xps-13-ultrabook',
                'brand' => 'Dell',
                'small_description' => 'Premium ultrabook for professionals and content creators.',
                'description' => 'Experience unparalleled performance and portability with the Dell XPS 13 Ultrabook. Ideal for professionals and content creators seeking a powerful yet compact laptop.',
                'original_price' => 1800,
                'selling_price' => 1600,
                'quantity' => 50,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Dell XPS 13 Ultrabook - Premium Laptop',
                'meta_keyword' => 'Dell XPS 13, Ultrabook, Premium Laptop, Dell',
                'meta_description' => 'Unleash your creativity and productivity with the premium Dell XPS 13 Ultrabook.'
            ],
            [
                'category_id' => 11,
                'name' => 'ASUS ROG Strix Scar 15 Gaming Laptop',
                'slug' => 'asus-rog-strix-scar-15-gaming-laptop',
                'brand' => 'ASUS',
                'small_description' => 'High-performance gaming laptop for competitive gamers.',
                'description' => 'Dominate the gaming arena with the ASUS ROG Strix Scar 15 Gaming Laptop. Engineered for competitive gamers, this high-performance laptop delivers exceptional graphics and responsiveness.',
                'original_price' => 2200,
                'selling_price' => 2000,
                'quantity' => 30,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'ASUS ROG Strix Scar 15 - Gaming Laptop',
                'meta_keyword' => 'ASUS ROG Strix Scar 15, Gaming Laptop, ASUS ROG, High-performance laptop',
                'meta_description' => 'Elevate your gaming experience with the powerful ASUS ROG Strix Scar 15 Gaming Laptop.'
            ],
            [
                'category_id' => 11,
                'name' => 'HP Spectre x360 Convertible Laptop',
                'slug' => 'hp-spectre-x360-convertible-laptop',
                'brand' => 'HP',
                'small_description' => 'Versatile convertible laptop for work and entertainment.',
                'description' => 'Experience versatility and style with the HP Spectre x360 Convertible Laptop. Seamlessly transition between work and entertainment with this elegant and powerful convertible laptop.',
                'original_price' => 1500,
                'selling_price' => 1300,
                'quantity' => 40,
                'trending' => 0,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'HP Spectre x360 - Convertible Laptop',
                'meta_keyword' => 'HP Spectre x360, Convertible Laptop, HP, Versatile laptop',
                'meta_description' => 'Adapt to every situation with the versatile HP Spectre x360 Convertible Laptop for work and entertainment.'
            ],
            [
                'category_id' => 11,
                'name' => 'Lenovo ThinkPad X1 Carbon Business Laptop',
                'slug' => 'lenovo-thinkpad-x1-carbon-business-laptop',
                'brand' => 'Lenovo',
                'small_description' => 'Reliable and lightweight business laptop for professionals.',
                'description' => 'Maximize your professional productivity with the Lenovo ThinkPad X1 Carbon Business Laptop. Built for reliability and performance, this lightweight laptop is designed to enhance your work efficiency.',
                'original_price' => 1700,
                'selling_price' => 1500,
                'quantity' => 60,
                'trending' => 0,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Lenovo ThinkPad X1 Carbon - Business Laptop',
                'meta_keyword' => 'Lenovo ThinkPad X1 Carbon, Business Laptop, Lenovo, Lightweight laptop',
                'meta_description' => 'Enhance your professional workflow with the reliable and lightweight Lenovo ThinkPad X1 Carbon Business Laptop.'
            ],
            [
                'category_id' => 11,
                'name' => 'Acer Aspire 5 Budget-Friendly Laptop',
                'slug' => 'acer-aspire-5-budget-friendly-laptop',
                'brand' => 'Acer',
                'small_description' => 'Affordable and efficient budget-friendly laptop for everyday use.',
                'description' => 'Experience reliable performance at an affordable price with the Acer Aspire 5 Budget-Friendly Laptop. Designed for everyday use, this efficient laptop offers great value and functionality.',
                'original_price' => 800,
                'selling_price' => 700,
                'quantity' => 70,
                'trending' => 0,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Acer Aspire 5 - Budget-Friendly Laptop',
                'meta_keyword' => 'Acer Aspire 5, Budget-Friendly Laptop, Acer, Affordable laptop',
                'meta_description' => 'Maximize value and efficiency with the affordable and efficient Acer Aspire 5 Budget-Friendly Laptop.'
            ],
        ];

        $phones = [
            [
                'category_id' => 6,
                'name' => 'Samsung Galaxy S21 Ultra 5G',
                'slug' => 'samsung-galaxy-s21-ultra-5g',
                'brand' => 'Samsung',
                'small_description' => 'Premium 5G smartphone with advanced camera and display features.',
                'description' => 'The Samsung Galaxy S21 Ultra 5G is a premium 5G smartphone with advanced camera capabilities, a stunning display, and exceptional performance. It is designed for tech enthusiasts and mobile photography enthusiasts seeking top-tier mobile technology and user experience.',
                'original_price' => 1200,
                'selling_price' => 1150,
                'quantity' => 25,
                'trending' => 1,
                'featured' => 1,
                'status' => 1,
                'meta_title' => 'Samsung Galaxy S21 Ultra 5G - Samsung',
                'meta_keyword' => 'Samsung Galaxy S21 Ultra 5G, Samsung, Smartphone, Premium',
                'meta_description' => 'Experience premium performance and photography with the Samsung Galaxy S21 Ultra 5G, featuring advanced camera and display features for a premium mobile experience.'
            ],
            [
                'category_id' => 6,
                'name' => 'Samsung Galaxy S21 Ultra 5G',
                'slug' => 'samsung-galaxy-s21-ultra-5g',
                'brand' => 'Samsung',
                'small_description' => 'Flagship 5G smartphone with advanced camera and display technology.',
                'description' => 'Unleash the power of 5G with the Samsung Galaxy S21 Ultra 5G. This flagship smartphone features advanced camera technology, a stunning ... ... display, and powerful performance, making it an ideal choice for tech enthusiasts and professionals.',
                'original_price' => 1200,
                'selling_price' => 1100,
                'quantity' => 35,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Samsung Galaxy S21 Ultra 5G - Samsung',
                'meta_keyword' => 'Samsung Galaxy S21 Ultra 5G, Samsung, Smartphone, 5G',
                'meta_description' => 'Experience the future of connectivity with the Samsung Galaxy S21 Ultra 5G, featuring advanced camera and display technology for a superior smartphone experience.'
            ],
            [
                'category_id' => 6,
                'name' => 'Google Pixel 6 Pro',
                'slug' => 'google-pixel-6-pro',
                'brand' => 'Google',
                'small_description' => 'Premium smartphone with advanced photography and AI capabilities.',
                'description' => 'Elevate your photography and productivity with the Google Pixel 6 Pro. This premium smartphone features advanced photography capabilities, AI-driven ... ... features, and a sleek design, making it an ideal choice for photography enthusiasts and professionals.',
                'original_price' => 900,
                'selling_price' => 800,
                'quantity' => 45,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Google Pixel 6 Pro - Google',
                'meta_keyword' => 'Google Pixel 6 Pro, Google, Smartphone, Photography',
                'meta_description' => 'Capture stunning photos and enjoy advanced AI capabilities with the Google Pixel 6 Pro, designed for photography enthusiasts and professionals.'
            ],
            [
                'category_id' => 6,
                'name' => 'OnePlus 9 Pro',
                'slug' => 'oneplus-9-pro',
                'brand' => 'OnePlus',
                'small_description' => 'Flagship smartphone with Hasselblad camera and fast charging technology.',
                'description' => 'Experience flagship performance and photography with the OnePlus 9 Pro. This smartphone features a Hasselblad camera system, fast charging technology, and a ... ... display, making it an ideal choice for tech enthusiasts and mobile photographers.',
                'original_price' => 950,
                'selling_price' => 900,
                'quantity' => 38,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'OnePlus 9 Pro - OnePlus',
                'meta_keyword' => 'OnePlus 9 Pro, OnePlus, Smartphone, Hasselblad camera',
                'meta_description' => 'Capture stunning photos and enjoy flagship performance with the OnePlus 9 Pro, featuring Hasselblad camera technology and fast charging capabilities.'
            ],
            [
                'category_id' => 6,
                'name' => 'Xiaomi Mi 11 Ultra',
                'slug' => 'xiaomi-mi-11-ultra',
                'brand' => 'Xiaomi',
                'small_description' => 'Ultra-premium smartphone with advanced camera and display features.',
                'description' => 'Experience the pinnacle of smartphone technology with the Xiaomi Mi 11 Ultra. This ultra-premium smartphone features advanced camera capabilities, a stunning ... ... display, and exceptional performance, making it an ideal choice for tech enthusiasts and mobile photography enthusiasts.',
                'original_price' => 1000,
                'selling_price' => 950,
                'quantity' => 42,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Xiaomi Mi 11 Ultra - Xiaomi',
                'meta_keyword' => 'Xiaomi Mi 11 Ultra, Xiaomi, Smartphone, Premium',
                'meta_description' => 'Experience the ultimate in smartphone technology with the Xiaomi Mi 11 Ultra, featuring advanced camera and display features for a premium mobile experience.'
            ]
        ];

        $watches = [
            [
                'category_id' => 10,
                'name' => 'Apple Watch Series 7',
                'slug' => 'apple-watch-series-7',
                'brand' => 'Apple',
                'small_description' => 'The ultimate smartwatch for your active lifestyle.',
                'description' => "The Apple Watch Series 7 is the ultimate smartwatch designed to complement your active lifestyle. With advanced health monitoring, fitness tracking, and seamless integration with your Apple devices, it's the perfect companion for your daily activities.",
                'original_price' => 399,
                'selling_price' => 379,
                'quantity' => 20,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Apple Watch Series 7 - Apple',
                'meta_keyword' => 'Apple Watch Series 7, Apple, Smartwatch, Fitness Tracker',
                'meta_description' => 'Experience the ultimate smartwatch with the Apple Watch Series 7, featuring advanced health monitoring and seamless integration with your Apple devices.'
            ],
            [
                'category_id' => 10,
                'name' => 'Casio G-Shock GA2100-4A',
                'slug' => 'casio-g-shock-ga2100-4a',
                'brand' => 'Casio',
                'small_description' => 'Iconic toughness and style in a modern digital watch.',
                'description' => "The Casio G-Shock GA2100-4A combines iconic toughness with modern digital features, making it a versatile and stylish choice for everyday wear. With its rugged design and advanced functionalities, it's the perfect companion for urban adventures.",
                'original_price' => 99,
                'selling_price' => 89,
                'quantity' => 30,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Casio G-Shock GA2100-4A - Casio',
                'meta_keyword' => 'Casio G-Shock GA2100-4A, Casio, Digital Watch, Toughness',
                'meta_description' => 'Experience iconic toughness and modern style with the Casio G-Shock GA2100-4A, a versatile digital watch designed for urban adventures.'
            ],
            [
                'category_id' => 10,
                'name' => 'Suunto 9 Baro',
                'slug' => 'suunto-9-baro',
                'brand' => 'Suunto',
                'small_description' => 'Adventure-ready GPS watch with long battery life.',
                'description' => "The Suunto 9 Baro is an adventure-ready GPS watch with a long battery life, designed for outdoor enthusiasts and athletes. With its robust construction and advanced navigation features, it's the perfect companion for demanding adventures in the great outdoors.",
                'original_price' => 499,
                'selling_price' => 469,
                'quantity' => 25,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Suunto 9 Baro - Suunto',
                'meta_keyword' => 'Suunto 9 Baro, Suunto, GPS Watch, Adventure',
                'meta_description' => 'Experience adventure-ready navigation and long battery life with the Suunto 9 Baro, designed for outdoor enthusiasts and athletes.'
            ],
            [
                'category_id' => 10,
                'name' => 'Garmin Forerunner 945',
                'slug' => 'garmin-forerunner-945',
                'brand' => 'Garmin',
                'small_description' => 'Advanced running and triathlon GPS smartwatch.',
                'description' => "The Garmin Forerunner 945 is an advanced GPS smartwatch designed for running and triathlon enthusiasts. With its comprehensive performance metrics and training features, it's the perfect tool for serious athletes aiming to elevate their performance and achieve their goals.",
                'original_price' => 599,
                'selling_price' => 549,
                'quantity' => 15,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Garmin Forerunner 945 - Garmin',
                'meta_keyword' => 'Garmin Forerunner 945, Garmin, GPS Smartwatch, Running Watch',
                'meta_description' => 'Elevate your running and triathlon performance with the Garmin Forerunner 945, an advanced GPS smartwatch designed for serious athletes.'
            ]
        ];

        $tvs = [
            [
                'category_id' => 7,
                'name' => 'Samsung QLED Q90T',
                'slug' => 'samsung-qled-q90t',
                'brand' => 'Samsung',
                'small_description' => 'Immersive QLED TV with exceptional picture quality.',
                'description' => 'Experience immersive entertainment with the Samsung QLED Q90T. This QLED TV delivers exceptional picture quality, vibrant colors, and ...',
                'original_price' => 2500,
                'selling_price' => 2000,
                'quantity' => 20,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Samsung QLED Q90T - Samsung',
                'meta_keyword' => 'Samsung QLED Q90T, Samsung, QLED TV, 4K TV',
                'meta_description' => 'Immerse yourself in stunning visuals with the Samsung QLED Q90T, a premium 4K QLED TV designed for exceptional picture quality.'
            ],
            [
                'category_id' => 7,
                'name' => 'LG OLED C1',
                'slug' => 'lg-oled-c1',
                'brand' => 'LG',
                'small_description' => 'Stunning OLED TV with cinematic viewing experience.',
                'description' => 'Enjoy a cinematic viewing experience with the LG OLED C1. This OLED TV offers stunning picture quality, deep blacks, and vibrant colors, creating an immersive ...',
                'original_price' => 2800,
                'selling_price' => 2600,
                'quantity' => 15,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'LG OLED C1 - LG',
                'meta_keyword' => 'LG OLED C1, LG, OLED TV, 4K TV',
                'meta_description' => 'Experience cinematic visuals with the LG OLED C1, a premium 4K OLED TV designed for immersive entertainment.'
            ],
            [
                'category_id' => 7,
                'name' => 'Sony Bravia X90J',
                'slug' => 'sony-bravia-x90j',
                'brand' => 'Sony',
                'small_description' => 'Immersive 4K LED TV with powerful picture processing.',
                'description' => 'Enter a world of immersive entertainment with the Sony Bravia X90J. This 4K LED TV features powerful picture processing, vibrant colors, and ...',
                'original_price' => 2200,
                'selling_price' => 1900,
                'quantity' => 18,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Sony Bravia X90J - Sony',
                'meta_keyword' => 'Sony Bravia X90J, Sony, LED TV, 4K TV',
                'meta_description' => 'Experience powerful picture processing with the Sony Bravia X90J, a premium 4K LED TV designed for immersive entertainment.'
            ],
            [
                'category_id' => 7,
                'name' => 'TCL 6-Series',
                'slug' => 'tcl-6-series',
                'brand' => 'TCL',
                'small_description' => 'High-performance QLED TV with Dolby Vision HDR.',
                'description' => 'Enjoy stunning visuals with the TCL 6-Series. This QLED TV features Dolby Vision HDR, high-performance display, and ...',
                'original_price' => 1500,
                'selling_price' => 1300,
                'quantity' => 25,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'TCL 6-Series - TCL',
                'meta_keyword' => 'TCL 6-Series, TCL, QLED TV, 4K TV',
                'meta_description' => 'Experience high-performance visuals with the TCL 6-Series, a premium QLED TV designed for stunning picture quality.'
            ],
            [
                'category_id' => 7,
                'name' => 'Vizio M-Series',
                'slug' => 'vizio-m-series',
                'brand' => 'Vizio',
                'small_description' => 'Immersive 4K HDR TV with SmartCast.',
                'description' => 'Immerse yourself in entertainment with the Vizio M-Series. This 4K HDR TV features SmartCast, immersive audio, and ...',
                'original_price' => 1200,
                'selling_price' => 1000,
                'quantity' => 22,
                'trending' => 1,
                'featured' => 1,
                'status' => 0,
                'meta_title' => 'Vizio M-Series - Vizio',
                'meta_keyword' => 'Vizio M-Series, Vizio, HDR TV, 4K TV',
                'meta_description' => 'Immerse yourself in entertainment with the Vizio M-Series, a premium 4K HDR TV designed for stunning visuals and immersive audio.'
            ],
        ];

        foreach ($cameras as $camera) {
            ShopProduct::create($camera);
        }

        foreach ($laptops as $laptop) {
            ShopProduct::create($laptop);
        }

        foreach ($phones as $phone) {
            ShopProduct::create($phone);
        }

        foreach ($watches as $watch) {
            ShopProduct::create($watch);
        }

        foreach ($tvs as $tv) {
            ShopProduct::create($tv);
        }
    }
}
