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
        // $this->call(UserSeeder::class);
        // factory(App\Dashboard\HutangPiutang\Hutang::class,100)->create();
        factory(App\Dashboard\HutangPiutang\Piutang::class,100)->create();
    }
}
