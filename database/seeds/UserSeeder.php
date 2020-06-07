<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash ;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        return factory('App\User',5)->create();
        $admin=\App\User::where('email','mostafa@mohamed')->first();
        if(! $admin){
             \App\User::create([
                'name'=>'mostafa',
                'email'=>'mostafa@mohamed',
                'password'=>Hash::make('62646284') ,
                'role'=>'admin'

            ]);

        }
    }
}
