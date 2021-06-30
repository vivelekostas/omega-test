<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Первоначальная загрузка должностей.
 * Class PositionSeeder
 * @package Database\Seeders
 */
class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('positions')->insert([
            'title' => 'Директор', //1
            'salary' => 100500.00,
        ]);

        DB::table('positions')->insert([
            'title' => 'Главный Менеджер', //2
            'salary' => 80.00,
        ]);

        DB::table('positions')->insert([
            'title' => 'Менеджер', //3
            'salary' => '70.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Главный бухгалтер', //4
            'salary' => '90.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Бухгалтер', //5
            'salary' => '80.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Водитель', //6
            'salary' => '60.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Грузчик', //7
            'salary' => '40.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Программист', //8
            'salary' => '80.00',
        ]);

        DB::table('positions')->insert([
            'title' => 'Контент менеджер', //9
            'salary' => '50.00',
        ]);
    }
}
