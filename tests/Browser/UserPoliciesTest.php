<?php

namespace Tests\Browser;

use App\Models\User;
//use Database\Factories\UserFactory;
use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class UserPoliciesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testGuestPolitics()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Laravel')
                ->visit('/users')
                ->assertPathIs('/login')
                ->visit('/departments')
                ->assertPathIs('/login')
                ->visit('/positions')
                ->assertPathIs('/login')
                ->visit('/');
        });
    }

    public function testAdminPolitics()
    {
        $user = User::find(51);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', '12345a')
                ->press('Login')
                ->visit('/users')
                ->assertSeeLink('Добавить Сотрудника')
                ->assertSee('Обновить')
                ->assertSee('Удалить')
                ->clickLink($user->name)
                ->clickLink('Logout');
        });
    }

    public function testManagerPolitics()
    {
        $user = User::find(52);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', '12345m')
                ->press('Login')
                ->visit('/users')
                ->assertSeeLink('Добавить Сотрудника')
                ->assertSee('Обновить')
                ->assertDontSee('Удалить')
                ->clickLink($user->name)
                ->clickLink('Logout');
        });
    }

    public function testUserPolitics()
    {
        $user = User::find(50);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', '12345u')
                ->press('Login')
                ->visit('/users')
                ->assertDontSeeLink('Добавить Сотрудника')
                ->assertSee('Обновить')
                ->assertDontSee('Удалить')
                ->clickLink($user->name)
                ->clickLink('Logout');
        });
    }
}
