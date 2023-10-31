<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        tap(User::factory([
            'name' => 'admin',
            'email' => 'admin@admin.ad'
        ])->create(),function($user){
            $role = Role::create(['name'=>'admin']);
            $user->assignRole($role);
        }
    );

    }
}
