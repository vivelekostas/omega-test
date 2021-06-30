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
        ]);
        $user->departments()->attach([1, 2]); // управление и продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 2, // главный менеджер
        ]);
        $user->departments()->attach([1, 2]); // управление и продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 3, // менеджер
        ]);
        $user->departments()->attach(2); // продажи

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 3, // менеджер
        ]);
        $user->departments()->attach(2); // продажи

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 4, // главный бухгалтер
        ]);
        $user->departments()->attach([1, 3]); // управление и бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 5, // бухгалтер
        ]);
        $user->departments()->attach(3); // бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameFemale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 5, // бухгалтер
        ]);
        $user->departments()->attach(3); // бухгалтерия

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 6, // Водитель
        ]);
        $user->departments()->attach(4); // Транспортный Отдел

        $user = User::create([
            'name' => $faker->firstNameMale,
            'last_name' => $faker->lastName,
            'email' => $faker->email,
            'password' => $faker->password(5,10),
            'position_id' => 7, // Грузчик
        ]);
        $user->departments()->attach(4); // Транспортный Отдел
    }
}

