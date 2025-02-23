<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\User\Models\User;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        // genrate user with user@app.com and pass: 12345678

        User::create([
            'name' => 'User',
            'email' => 'user@app.com',
            'password' => bcrypt('12345678'),
            'email_verified_at' => now(),
        ]);

        $this->command->info('User created with email:');

        User::factory()->count(5)->create();
        $this->command->info('5 Users created with email:');
    }
}
