<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin Istrator',
            'email' => 'admin@example.com',
            'password' => 'password1',
        ]);

        User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'password' => 'password1',
        ]);

        User::factory()->create([
            'name' => 'Client User',
            'email' => 'client@example.com',
            'password' => 'password1',
        ]);

        User::factory()->create([
            'name' => 'Dummy User',
            'email' => 'dummy@example.com',
            'password' => 'password1',
        ]);

        User::factory(6)->create();

        $this->call([
            ContactSeeder::class,
        ]);
    }
}
