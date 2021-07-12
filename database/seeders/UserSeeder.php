<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Создаёт первоначальных сотрудников, присваивая им должность и отдел/отделы.
 * Class UserSeeder
 * @package Database\Seeders
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('ru_RU');

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 1, // директор
            'role_id' => 3,
        ]);
        $user->departments()->attach([1, 2]); // управление и продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 2, // главный менеджер
            'role_id' => 3,
        ]);
        $user->departments()->attach([1, 2]); // управление и продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 3, // менеджер
            'role_id' => 3,
        ]);
        $user->departments()->attach(2); // продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 3, // менеджер
            'role_id' => 3,
        ]);
        $user->departments()->attach(2); // продажи

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 4, // главный бухгалтер
            'role_id' => 3,
        ]);
        $user->departments()->attach([1, 3]); // управление и бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 5, // бухгалтер
            'role_id' => 3,
        ]);
        $user->departments()->attach(3); // бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 5, // бухгалтер
            'role_id' => 3,
        ]);
        $user->departments()->attach(3); // бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 6, // Водитель
            'role_id' => 3,
        ]);
        $user->departments()->attach(4); // Транспортный Отдел

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => 'user@login.com',
            'password' => '12345u',
            'position_id' => 7, // Грузчик
            'role_id' => 3,
        ]);
        $user->departments()->attach(4); // Транспортный Отдел

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => 'admin@login.com',
            'password' => '12345a',
            'position_id' => 8, // Программист
            'role_id' => 1,
        ]);
        $user->departments()->attach(5); // it

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => 'manager@login.com',
            'password' =>  '12345m',
            'position_id' => 9, // Контент менеджер
            'role_id' => 2,
        ]);
        $user->departments()->attach(5); // it
    }
}

