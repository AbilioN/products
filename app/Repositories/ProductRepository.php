<?php
namespace App\Repositories;

use App\Models\Product;
use App\Models\ProductCategory;
use Exception;
use Illuminate\Support\Facades\DB;

class ProductRepository 
{

    private Product $model;

    private string $name;

    private string $description;

    private float $price;

    private int $quantity;

    private ProductCategory $category;



    function __construct(Product $model , ProductCategory $category)
    {
        $this->model = $model;
        $this->category = $category;
    }
    
    public function prepareParameters($params)
    {
        
        $this->name = $params['name'];
        $this->description = $params['description'];
        $this->price = $params['price'];
        $this->quantity = $params['quantity'];
        $this->category = $this->category->findOrFail($params['category_id']);
        
    }

    public function checkParametersBeforeCreate()
    {
        // validate if everything is correct to use

        if(!$this->category instanceof ProductCategory && !isset($this->category->id))
        {
            throw new Exception('Category Not Found');
        }

    }

    public function create() : void
    {
        DB::beginTransaction();


        $createdProduct = $this->model->create([
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category_id' => $this->category->id,
        ]);

        if(!$createdProduct)
        {
            DB::rollback();
        }

        DB::commit();

    }
}