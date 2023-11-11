<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            'name' => 'Admin Aplikasi',
            'jenis_kelamin' => 'Laki-laki',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(), // Tambahkan field email_verified_at
            'password' => bcrypt('admin123'),
            'role' => 'Admin',
            'remember_token' => Str::random(60),
        ]);
    }
}
