<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $user = new User();
        $user->name = "Distrito 1 Solola";
        $user->tipo = "1";
        $user->email = "distrito1solola@gmail.com";
        $user->password = '$2y$10$pJCnDIsqSxS3Ag6JzNP6zuUvEBFgm1yR2KhyJhzCU8FMEahByxmB6';
        $user->save();
    }
}
