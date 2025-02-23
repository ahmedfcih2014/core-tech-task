<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $role = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);
        Role::create(['name' => 'editor']);
        User::factory()->create([
            'name' => 'System Admin',
            'email' => 'admin@core-tech.test',
            'password' => '123456',
            'role_id' => $adminRole->id,
        ]);
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => '123456',
            'role_id' => $role->id,
        ]);
        Post::factory(5)->create([
            'user_id' => $user->id,
        ]);
    }
}
