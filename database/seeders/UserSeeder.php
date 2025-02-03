<?php

namespace Database\Seeders;

use App\Models\User;
use App\Enum\UserEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(UserEnum::cases() as $user){
            User::factory()->create([
                'name' => $user->names(),
                'email' => $user->value,
                'password' => Hash::make($user->passwords()),
            ]);
        }
    }
}
