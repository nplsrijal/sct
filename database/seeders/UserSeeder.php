<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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
        DB::table('users')->insert([
            'fname' => 'Srijal',
            'lname' => 'Nepal',
            'mobilenumber' => '9842572377',
            'email' => 'srijal@gmail.com',
            'countrycode' => '977',
            'usertype' => '1',
            'isactive' => 'Y',
            'password'=>bcrypt('12345678')           
        ]);
    }
}
