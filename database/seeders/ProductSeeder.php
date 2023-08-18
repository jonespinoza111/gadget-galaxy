<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('products')->insert([
            [
                'name'=>'Samsung Phone',
                'price'=>'200',
                'description'=>'A smartphone with a lot of ram and other features',
                'category'=>'mobile',
                'gallery'=>'https://tinyurl.com/37suad66'
            ],
            [
                'name'=>'IPhone 14',
                'price'=>'800',
                'description'=>'An apple phone with a lot of ram and other features',
                'category'=>'mobile',
                'gallery'=>'https://tinyurl.com/bdeztwhj'
            ],
            [
                'name'=>'4k TV',
                'price'=>'600',
                'description'=>'A smart tv with a lot of features',
                'category'=>'TV',
                'gallery'=>'https://tinyurl.com/23us68wb'
            ],
            [
                'name'=>'Google Home',
                'price'=>'100',
                'description'=>'A home with a lot of ram and other features',
                'category'=>'mobile',
                'gallery'=>'https://tinyurl.com/3dzrcym3'
            ],
            [
                'name'=>'Smart Fridge',
                'price'=>'450',
                'description'=>'A smart fridge with a lot of features',
                'category'=>'appliances',
                'gallery'=>'https://tinyurl.com/ywswkxb9'
            ],
        ]);
    }
}
