<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserRegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_user_successful()
    {
        $response = $this->post(route('userRegister'), [
            'full_name' => 'shamilion',
            'name' => 'shami',
            'email' => 'shamil79797@gmail.com',
            'phone_number' => '89993116123',
            'avatar' => null,
            'password' => 'password',
            'short_lang' => 'ru',
        ]);
        $response->assertStatus(201);
    }

    public function test_user_null()
    {
        $response = $this->post(route('userRegister'));
        $response->assertUnprocessable();
    }
}
