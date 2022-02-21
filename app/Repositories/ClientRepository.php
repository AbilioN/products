<?php

namespace App\Repositories;

use App\Models\Client;
use App\ObjectValues\Cpf;
use App\ObjectValues\Email;
use Exception;
use Illuminate\Support\Facades\DB;

class ClientRepository  
{

    private Client $model;

    private ?string $name;

    private Cpf $cpf;

    private Email $email;

    

    function __construct(Client $model)
    {
        $this->model = $model;
    }


    public function prepareParameters(array $params) : void
    {

        $this->name = $params['name'];
        $this->cpf = new Cpf($params['cpf']);
        $this->email = new Email($params['email']);
    }

    public function checkParametersBeforeCreate()
    {
        $this->verifyEmailAlreadyExists();
        $this->verifyCpfAlreadyExists();
    }

    public function verifyEmailAlreadyExists() : bool
    {
        $client = $this->model->where(['email' => $this->email->__toString()])->first();

        if(!$client)
        {
            return true;
        }
        
        throw new Exception('This email is already in use');

    }

    public function verifyCpfAlreadyExists()
    {
        $client = $this->model->where(['cpf' => $this->cpf->__toString()])->first();

        if(!$client)
        {
            return true;
        }
        
        throw new Exception('This cpf is already in use');
    }

    public function create() : Client
    {
        DB::beginTransaction();

        $client = $this->model->create([
            'name' => $this->name,
            'email' => $this->email->__toString(),
            'cpf' => $this->cpf->__toString()
        ]);

        if(!$client)
        {
            DB::rollback();
        }

        DB::commit();

        return $client;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function delete($clientId)
    {
        $deleted = $this->model->find($clientId)->delete();
        if(!$deleted)
        {
            throw new Exception('Error, this client could not be deleted');
        }

        return;
    }
}