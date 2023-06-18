<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventoTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /**
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    */

    public function test_evento_index(): void
    {

        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['banned' => false])
                         ->get('/eventos');
        $response->assertStatus(200);
    }

    public function test_evento_store()
    {

    }




}
