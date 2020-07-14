<?php

use Illuminate\Database\Seeder;

class FakerSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Models\Test', 50)->create();
    }
}
