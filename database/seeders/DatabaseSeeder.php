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
        $this->call([
            RolePermissionSeeder::class,
        ]);

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'phone' => '081234567890',
            'status' => 'active',
        ]);
        $admin->assignRole('admin');

        // Create staff user
        $staff = User::factory()->create([
            'name' => 'Staff User',
            'email' => 'staff@example.com',
            'phone' => '081234567891',
            'status' => 'active',
        ]);
        $staff->assignRole('staff');

        // Create test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'phone' => '081234567892',
            'status' => 'active',
        ]);

        $this->call([
            KaryawanSeeder::class,
        ]);
    }
}
