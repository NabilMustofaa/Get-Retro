<?php

namespace Database\Seeders;

use App\Models\brand;
use App\Models\category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        category::create([
            'categoryName'=>'Shirt',
            'categoryImage'=>'img/category/shirt.jpg'
        ]);
        category::create([
            'categoryName'=>'Crewneck',
            'categoryImage'=>'img/category/crewneck.jpg'
        ]);
        category::create([
            'categoryName'=>'Flavah',
            'categoryImage'=>'img/category/flavah.jpg'
        ]);
        category::create([
            'categoryName'=>'Hoodie',
            'categoryImage'=>'img/category/hoodie.jpg'
        ]);
        category::create([
            'categoryName'=>'Woman Crewneck',
            'categoryImage'=>'img/category/womancrewneck.jpg'
        ]);
        brand::create([
            'brandName'=>'agatha',
            'brandImage'=>'img/brand/agatha.jpg'
        ]);
        brand::create([
            'brandName'=>'dickies',
            'brandImage'=>'img/brand/dickies.jpg'
        ]);
        brand::create([
            'brandName'=>'feltics',
            'brandImage'=>'img/brand/feltics.jpg'
        ]);
        brand::create([
            'brandName'=>'guess',
            'brandImage'=>'img/brand/guess.jpg'
        ]);
        brand::create([
            'brandName'=>'other brand',
            'brandImage'=>'img/brand/otherbrand.jpg'
        ]);
        brand::create([
            'brandName'=>'sport brand',
            'brandImage'=>'img/brand/sportbrand.jpg'
        ]);
        User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'address'=>'admin address',
            'password'=>bcrypt('admin'),
            'admin'=>true,
        ]);
        User::create([
            'name'=>'admin2',
            'email'=>'admin2@gmail.com',
            'address'=>'admin2 address',
            'password'=>bcrypt('admin'),
            'admin'=>true,
        ]);
    }
}
