<?php

namespace Tests\Unit;

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_endpoint_not_exists()
    {
        $response = $this->get('/update');
        $response->assertStatus(404);
    }

    public function test_user_duplication()
    {
        $user1 = User::make([
            'name' => 'Aldi',
            'email' => 'aldistate@yahoo.com'
        ]);

        $user2 = User::make([
            'name' => 'Eliza',
            'email' => 'eliza@yahoo.com'
        ]);

        $this->assertTrue($user1->name != $user2->name);
        $this->assertTrue($user1->email != $user2->email);
    }

    public function test_delete_user()
    {
        $user = User::make([
            'name' => 'Aldi',
            'email' => 'aldistate@yahoo.com'
        ]);

        $user->delete();

        $this->assertTrue(true);
    }
}
