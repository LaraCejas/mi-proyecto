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
        $this->truncateTables([
            'users',
        ]);

        // $this->call(UsersTableSeeder::class);

        $this->call(UsersSeeder::class);
    }

    protected function truncateTables(array $tables) {
        foreach($tables as $table) {
            DB::table($table)->truncate();
        }
    }
}
