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

        factory(App\Model\Pessoa::class,100)->create();

        factory(App\Model\Imovel::class,350)->create();
    }
}
