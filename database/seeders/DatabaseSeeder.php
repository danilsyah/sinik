<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Employee;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        // Role::create([
        //     'nama_rule'=> 'admin',
        // ]);

        // Role::create([
        //     'nama_rule'=> 'staff'
        // ]);

        // User::factory(5)->create();

        Employee::factory(5)->create();

    }
}
