<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Car;

class CarsControllerTest extends TestCase
{
   public function testIndex()
	{
		$response = $this->get('/vehicles');
		$response->assertStatus(200);
	}

	public function testCreate()
	{
		$response = $this->get('vehicles/create-vehicle');
		$response->assertStatus(200);
	}
}
