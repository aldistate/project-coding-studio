<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_cannot_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Eliza',
            'email' => 'eliza@yahoo.com',
            'password' => 'eliza',
            'password_confirmation' => 'eliza',
            'role' => 'member'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'eliza@yahoo.com',
        ]);

        $user = User::where('email', 'eliza@yahoo.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(403);
    }

    public function test_admin_can_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Aldi',
            'email' => 'aldistate@yahoo.com',
            'password' => 'aldistate',
            'password_confirmation' => 'aldistate',
            'role' => 'admin'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'aldistate@yahoo.com',
        ]);

        $user = User::where('email', 'aldistate@yahoo.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(200);
    }
}
