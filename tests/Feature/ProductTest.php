<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use Database\Seeders\ProductCategorySeeder;
use Database\Seeders\ProductSeeder;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    protected Product $model;
    public function setup() : void {

        parent::setup();
        
        $this->seed(ProductCategorySeeder::class);
        $this->seed(ProductSeeder::class);
        $this->table = 'produtcs';
        $this->model = new Product();
        $this->product = Product::factory()->make();

        // $this->withExceptionHandling();
        $this->withoutExceptionHandling();

    }

    /** @test */ 

    public function a_product_can_be_created()
    {
        $totalRowsBeforeCreate = $this->model->all()->count();
        $response = $this->post(route('products.create'), $this->product->toArray());
        $response->assertStatus(302);
        $totalRowsAfterCreate = $this->model->all()->count();
        $this->assertGreaterThan($totalRowsBeforeCreate, $totalRowsAfterCreate);
        $this->assertEquals($totalRowsAfterCreate, $totalRowsBeforeCreate + 1);
       
    }
}
