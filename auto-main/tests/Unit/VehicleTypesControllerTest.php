<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VehicleTypesControllerTest extends TestCase
{
	public function testIndex()
	{
		$response = $this->get('/vehicle-types');
        $response->assertStatus(200);
	}

	public function testStore()
    {
    	$type = factory('App\Type')->create();
    	$response = $this->json('POST', '/vehicle-types/store', json_decode($type, true));
    	$response ->assertStatus(200);
    }

    public function testDelete()
    {
    	$type = factory('App\Type')->create();
    	$response = $this->json('POST', '/vehicle-types/remove/'.$type->id, json_decode($type, true));
    	$response ->assertStatus(200);
    }
}
