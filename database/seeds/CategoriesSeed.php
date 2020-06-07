<?php

use Illuminate\Database\Seeder;
use App\Category ;
class CategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        return factory('App\Category',3)->create();
    }
}
