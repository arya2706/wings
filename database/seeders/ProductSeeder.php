<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'produce_code' =>'SKUSKILNP',
            'produce_name' =>'So klin Pewangi',
            'price' =>'13500',
            'currancy' => 'IDR',
            'discount' => '10',
            'dimension' =>'13 cm x 10 cm',
            'unit' => 'PCS',
            'status' =>1,

        ]);

        Product::create([
            'produce_code' =>'GVIURIBTR',
            'produce_name' =>'Giv Biru',
            'price' =>'11000',
            'currancy' => 'IDR',
            // 'discount' => '',
            'dimension' =>'13 cm x 10 cm',
            'unit' => 'PCS',
            'status' =>1,

        ]);


        Product::create([
            'produce_code' =>'LIKSONLIN',
            'produce_name' =>'So klin Liquid',
            'price' =>'18000',
            'currancy' => 'IDR',
            // 'discount' => '',
            'dimension' =>'13 cm x 10 cm',
            'unit' => 'PCS',
            'status' =>1,

        ]);
    }
}
