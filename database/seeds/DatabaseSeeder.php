<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(seederestados::class);
        $this->call(seedersitios::class);
        $this->call(seedertipos::class);
        $this->call(seederunidades::class);
        $this->call(seederusuario::class);
        $this->call(seederroles::class);
        $this->call(seederpermisos::class);
    }
}
