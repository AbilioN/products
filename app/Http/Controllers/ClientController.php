<?php

namespace App\Http\Controllers;

use App\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    private ClientService $client;
    
    function __construct(ClientService $client)
    {
        $this->client = $client;
    }

    public function create(Request $request)
    {

        $this->client->prepareParameters($request->all());
        $this->client->checkParametersBeforeCreate();
        $createdClient = $this->client->createClient();
        


    }
}
