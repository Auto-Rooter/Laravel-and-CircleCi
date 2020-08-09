<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserTest extends TestCase
{
   
    use WithFaker;

    private $password = "12345678";
    
    public function testUserCreation()
    {
       	
       	$name = $this->faker->name();
       	$email = $this->faker->email();

        $data = [
            'name' => $name, 
            'email' => $email,
            'password' => $this->password, 
            'password_confirmation' => $this->password
        ];

        
        $this->post('/api/auth/signup', $data)
            ->assertStatus(201)
            ->assertExactJson([
                'message' => "User Registered Successfully...",
            ]);
    }

}