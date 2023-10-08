<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class FormPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('form_permission')->insert(
            [
            'formname' => 'User Group',
             'slug'=>'user-group',
             'isinsert'=>'Y',
             'isupdate'=>'Y',
             'isedit'=>'Y',
             'isdelete'=>'Y',
             'usertypeid'=>'1'
            ]
        );

        DB::table('form_permission')->insert(
            [
            'formname' => 'Users',
             'slug'=>'users',
             'isinsert'=>'Y',
             'isupdate'=>'Y',
             'isedit'=>'Y',
             'isdelete'=>'Y',
             'usertypeid'=>'1'
            ]
        );

        

    }
}
