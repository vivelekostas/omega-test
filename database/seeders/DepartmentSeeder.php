<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Первоначальная загрузка отделов.
 * Class DepartmentSeeder
 * @package Database\Seeders
 */
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([ //1
            'title' => 'Отдел Управления',
        ]);

        DB::table('departments')->insert([ //2
            'title' => 'Отдел Продаж',
        ]);

        DB::table('departments')->insert([ //3
            'title' => 'Бухгалтерия',
        ]);

        DB::table('departments')->insert([ //4
            'title' => 'Транспортный Отдел',
        ]);

        DB::table('departments')->insert([ //5
            'title' => 'it отдел',
        ]);
    }
}
