<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class UserLoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();

    }

    public function test_user_successful()
    {
        $response = $this->post(route('login'), [
            'email' => $this->user->email,
            'password' => 'password'
        ]);
        $response->assertStatus(200);
    }
    public function test_user_failed(){
        $response = $this->post(route('login'),[
            'email'=>$this->user->email,
            'password' => 'gfjdsgk'
        ]);
        $response->assertUnprocessable();
    }
}
