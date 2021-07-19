<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use Illuminate\Foundation\Testing\WithFaker;

class UserTest extends DuskTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    use withFaker;

    public function testCreateUser()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(51))
                ->visit('/users')
                ->clickLink('Добавить Сотрудника')
                ->type('name', $this->faker->firstNameMale)
                ->type('last_name', $this->faker->lastName)
                ->type('email', $this->faker->email)
                ->type('password', bcrypt($this->faker->password))
                ->select('position_id', 7)
                ->select('role_id', 3)
                ->select('department_id[]', 4)
                ->press('Создать')
                ->assertPathIs('/users');
        });

        $user = User::last();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/users')
                ->assertSee($user->name)
                ->assertSee($user->last_name)
                ->assertSee($user->email)
                ->assertSee($user->position->title);
        });
    }

    public function testUpdateUser()
    {
        $user = User::last();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/users/' . $user->id . '/edit')
                ->type('name', $user->name)
                ->type('last_name', $user->last_name)
                ->type('email', $this->faker->email)
                ->select('position_id', 9)
                ->select('role_id', 2)
                ->select('department_id[]', 5)
                ->press('Обновить')
                ->assertPathIs('/users');
        });

        $user = User::last();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->assertSee($user->name)
                ->assertSee($user->last_name)
                ->assertSee($user->email)
                ->assertSee($user->position->title);

        });
    }
}
