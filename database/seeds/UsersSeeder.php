<?php

use App\User;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Lara',
            'lastName' => 'Cejas',
            'email' => 'malaracejas@gmail.com',
            'password' => bcrypt('laravel'),
            'is_admin' => true,
        ]);

        factory(User::class, 49)->create();
    }
}
