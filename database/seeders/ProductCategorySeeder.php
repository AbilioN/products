<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'category' => 'Bakery'
            ],
            [
                'category' => 'Grocery'
            ],
            [
                'category' => 'Fish'
            ],
            [
                'category' => 'Vegetables'
            ],
            [
                'category' => 'Fruits'
            ],
        ]);
    }
}
