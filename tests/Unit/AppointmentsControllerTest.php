<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Appointment;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AppointmentsControllerTest extends TestCase
{
    public function testIndex()
	{
		$response = $this->get('/appointments');
		$response->assertStatus(200);
	}

	public function testCreate()
	{
		$response = $this->get('appointments/book-appointment');
		$response->assertStatus(200);
	}

	public function testStore()
	{
		$appointment = factory('App\Appointment')->create();
		$response = $this->json('POST', '/appointments/book-appointment', json_decode($appointment, true));
    	$response ->assertStatus(200);
	}

    public function testDelete()
    {
    	$appointment = factory('App\Appointment')->create();
    	$response = $this->json('POST', '/appointments/remove/'.$appointment->id, json_decode($appointment, true));
    	$response ->assertStatus(200);
    }

      public function testShow()
    {
    	$appointment = factory('App\Appointment')->create();
    	$response = $this->json('POST', '/appointments/show/'.$appointment->id, json_decode($appointment, true));
    	$response ->assertStatus(200);
    }
}
