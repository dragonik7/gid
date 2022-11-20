<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\Gid\PlaceSeeder;
use Database\Seeders\Gid\TourSeeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        User::create([
            'full_name' => "Ибрагимов Шамиль",
            'name' => 'shami',
            'email' => 'shamil79797@gmail.com',
            'phone_number' => '+7 (999) 311 61-23',
            'email_verified_at' => now(),
            'avatar' => 'https://via.placeholder.com/640x480.png/00aadd?text=consequatur',
            'password' => 'password',
            'short_lang' => 'RU',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        User::factory(10)->create();
        $this->call(PlaceSeeder::class);

        $this->call(TourSeeder::class);

    }
}
