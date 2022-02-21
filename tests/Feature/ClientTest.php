<?php

namespace Tests\Feature;

use App\Models\Client;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{

    use DatabaseMigrations;

    public function setup() : void {

        parent::setup();
        
        $this->table = 'client';
        $this->client = Client::factory()->make();
        $this->model = new Client();

        $this->withoutExceptionHandling();
    }

    /** @test */ 
    public function a_client_can_be_created()
    {
        $totalRowsBeforeCreate = $this->model->all()->count();
        $response = $this->post('/clients/create', $this->client->toArray());
        $response->assertStatus(302);
        $totalRowsAfterCreate = $this->model->all()->count();
        $this->assertGreaterThan($totalRowsBeforeCreate, $totalRowsAfterCreate);
        $this->assertEquals($totalRowsAfterCreate, $totalRowsBeforeCreate + 1);

    }

        /** @test */ 
        public function a_client_name_is_required()
        {
            $totalRowsBeforeCreate = $this->model->all()->count();
    
            $productArray = $this->client->toArray();
            $productArray['name'] = '';
            $response = $this->post(route('clients.create'), $productArray)->assertSessionHasErrors('name');
            $response->dumpSession();
           
            $totalRowsAfterCreate = $this->model->all()->count();
            $this->assertEquals($totalRowsAfterCreate, $totalRowsBeforeCreate);
    
    
    
        }

}
