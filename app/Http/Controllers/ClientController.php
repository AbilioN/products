<?php

namespace App\Http\Controllers;

use App\Repositories\ClientRepository;
use Exception;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    private ClientRepository $repo;
    
    function __construct(ClientRepository $repo)
    {
        $this->repo = $repo;
    }

    public function create(Request $request)
    {
        try {

            $this->repo->prepareParameters($request->all());
            $this->repo->checkParametersBeforeCreate();
            $this->repo->create();
            flash('Client create sucessfully')->success();
            return redirect()->back();
        }catch(Exception $e) {
            flash($e->getMessage())->error();
            return redirect()->back();
        }

    
    }

    public function show(Request $request)
    {
        $clients = $this->client->findAll();
        return view('clientes' , compact('clients'));
    }
}
