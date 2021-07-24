<?php

namespace Tests\Feature;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookingErrorTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = [];

        $token = auth()->guard('api')->login(User::whereEmail("mohamed@gmail.com")->first());
        $headers = [] ;
        $headers['Authorization'] = 'Bearer ' . $token;
        $headers['apiSecret'] = 'd54fdk!d5&m';
        return $this->json(
            'GET', 
            'http://127.0.0.1:8020/api/getlist',
            $data,
            $headers
        )->assertStatus(404);
        
    }
}
