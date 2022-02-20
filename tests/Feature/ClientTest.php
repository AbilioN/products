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
        $response->assertStatus(200);
        dd($this->client->toArray());
        // $this->assertDatabaseHas('client' , $this->client->toArray());
        $totalRowsAfterCreate = $this->model->all()->count();
        $this->assertGreaterThan($totalRowsBeforeCreate, $totalRowsAfterCreate);
        $this->assertEquals($totalRowsAfterCreate, $totalRowsBeforeCreate + 1);

    }
}
