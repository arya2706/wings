<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jane Doe',
            'email' => 'jane@gmail.com',
            'password' => Hash::make('12345678'),
            
        ]);

        User::create([
            'name' => 'Mike Doe',
            'email' => 'mike@gmail.com',
            'password' => Hash::make('12345678'),
            
        ]);
        User::create([
            'name' => 'Pamela Doe',
            'email' => 'pamela@gmail.com',
            'password' => Hash::make('12345678'),
            
        ]);
    }
}
