<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $response = Http::get('https://6645b17cb8925626f892bb46.mockapi.io/auction-live/users');
        
        if ($response->successful()) {
            $users = $response->json(); // Extract JSON content from the response
          
            collect($users)->each(function($user){
                User::create([
                    'name' => $user['name'],
                    'address' => $user['address'],
                    'country' => $user['country'],
                    'phone_number' => $user['phonenumber'],
                    'occupation' => $user['occupation'],
                    'email' => $user['email'],
                ]);
            });
        }
    }
}
