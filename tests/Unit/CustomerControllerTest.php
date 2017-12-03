<?php
namespace Tests\Unit;

use Tests\TestCase;
use App\Customer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CustomerControllerTest extends TestCase
{
	use WithoutMiddleware;

    public function testIndex()
    {
    	$response = $this->get('/customers');
        $response->assertStatus(200);
    }

    public function testCreate()
    {
    	$response = $this->get('/customers/create-customer/');
    	$response->assertStatus(200);
    }

    public function testStore()
    {
    	$customer = factory('App\Customer')->create();
    	$response = $this->json('POST', '/customers/store-customer', json_decode($customer, true));
    	$response ->assertStatus(200);
    }

    public function testUpdate()
    {
    	$customer = factory('App\Customer')->create();
    	$response = $this->json('POST', '/customers/update/'.$customer->id, json_decode($customer, true));
    	$response ->assertStatus(200);
    }

    public function testDelete()
    {
    	$customer = factory('App\Customer')->create();
    	$response = $this->json('POST', '/customers/remove/'.$customer->id, json_decode($customer, true));
    	$response ->assertStatus(200);
    }

      public function testShow()
    {
    	$customer = factory('App\Customer')->create();
    	$response = $this->json('POST', '/customers/show/'.$customer->id, json_decode($customer, true));
    	$response ->assertStatus(200);
    }
}
