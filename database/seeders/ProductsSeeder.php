<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price = mt_rand(100, 2000);

        DB::table('products')->insert([
            'name' => Str::random(10),
            'price' => $price,
            'description' => Str::random(100)
        ]);   
    }
}
