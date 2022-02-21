<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public $model = Product::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph(),
            'price' => $this->fakePrice(1 , 1000),
            'quantity' => rand(1, 100),
            'category_id' => ProductCategory::inRandomOrder()->first()->id
        ];
    }

    function fakePrice($min, $max){
        $decimals = 2; // number of decimal places
        $div = pow(10, $decimals);
        return rand($min * $div, $max * $div) / $div;
    }
}
