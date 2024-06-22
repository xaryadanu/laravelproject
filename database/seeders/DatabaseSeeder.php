<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
        $user->name = "Admin";
        $user->email = "xaryadanu@gmail.com";
        $user->password = bcrypt("aryadanu");
        $user->isAdmin = 1;
        $user->save();
            

    }
}
