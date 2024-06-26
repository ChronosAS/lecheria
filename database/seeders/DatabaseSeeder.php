<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\News\NewsBulletin;
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
            'email' => 'prensa@lecheria.gob',
        ])->create(),function($user){
            $role = Role::create(['name'=>'admin']);
            $user->assignRole($role);
        }
    );
    NewsBulletin::factory(['url'=>'ejemplo.com']);

    }
}
