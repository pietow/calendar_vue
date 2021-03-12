<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CalendarEventTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_the_api_route_index()
    {
        $response = $this->getJSON(route('event.index'));

        $response->assertStatus(200);
        $response->assertJsonFragment(['id' => "1"]);
    }
}
