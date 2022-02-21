<?php

namespace App\Http\Controllers;

use App\Repositories\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepository $repo;
    function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }
    public function create(Request $request)
    {

        try{

            $this->repo->prepareParameters($request->all());
            $this->repo->checkParametersBeforeCreate();
            $this->repo->create();
            flash('Client create sucessfully')->success();
            return redirect()->back();


        }catch(Exception $e){

        }

    }
}
