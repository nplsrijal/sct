<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModulesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['modulesid' => 1, 'usertypeid' => 1],
            ['modulesid' => 1, 'usertypeid' => 2],
            ['modulesid' => 3, 'usertypeid' => 1],
            ['modulesid' => 3, 'usertypeid' => 2],
            ['modulesid' => 4, 'usertypeid' => 1],
            ['modulesid' => 4, 'usertypeid' => 2],
            ['modulesid' => 5, 'usertypeid' => 1],
            ['modulesid' => 6, 'usertypeid' => 1],
            ['modulesid' => 6, 'usertypeid' => 2],
            ['modulesid' => 7, 'usertypeid' => 1],
            ['modulesid' => 7, 'usertypeid' => 2],
            ['modulesid' => 8, 'usertypeid' => 1],
            ['modulesid' => 8, 'usertypeid' => 2],
           
        ];

        foreach ($data as $item) {
            DB::table('module_permission')->insert($item);
        }
    }
}
