<?php

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
        // $this->call(UsersTableSeeder::class);
        App\User::create([
            'name' => 'Iván Portillo',
            'email' => 'ivan@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        factory(App\Task::class, 24)->create();
    }
}
