<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     ContactSeeder::class
        // ]);

        User::create([
            'fullname' => 'Palak',
            'email' => 'palaksharma9796@gmail.com',
            'password' => Hash::make('Palak@12'),
            'type' => 'admin',
            'status' => 'active'
        ]);

        
    }
}
