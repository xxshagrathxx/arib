<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin',
            'password' => \Hash::make('P@$$w0rd_098'),
            'email' => 'owner@binbug.net',
            'phone' => '01234567890',
            'email_verified_at' => now(),
            'role_id' => 1, // As this is the super admin
            'avatar' => 'default.png',
            'remember_token' => Str::random(10),
        ]);

        $user->assignRole('Super Admin');
    }
}
