<?php

namespace Database\Seeders;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'email' => 'neto@gmail.com',
            'password' => bcrypt('123456')
        ]);
        Nota::factory(10)->create();
    }
}
