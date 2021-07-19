<?php

namespace Tests\Browser;

use App\Models\Department;
use App\Models\Position;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PositionTest extends DuskTestCase
{
    public $positionTitle;
    public $newPositionTitle;
    public $salary;
    public $newSalary;

    protected function setUp() : void
    {
        parent::setUp();

        $this->positionTitle = 'Киллер';
        $this->newPositionTitle = 'Наёмный Убийца';
        $this->salary = 200;
        $this->newSalary = 300;
    }

    public function testCreateNewPosition()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(51))
                ->visit('/positions')
                ->clickLink('Создать Должность')
                ->type('title', $this->positionTitle)
                ->type('salary', $this->salary)
                ->press('Создать')
                ->assertPathIs('/positions')
                ->assertSee($this->positionTitle);
        });
    }

    public function testUpdateNewDepartment()
    {
        $position = Position::latest()->first();

        $this->browse(function (Browser $browser) use($position) {
            $browser->visit('/positions/' . $position->id . '/edit')
                ->type('title', $this->newPositionTitle)
                ->type('salary', $this->newSalary)
                ->press('Обновить')
                ->assertPathIs('/positions')
                ->assertSee($this->newPositionTitle)
                ->assertSee($this->newSalary)
                ->assertDontSee($this->positionTitle)
                ->assertDontSee($this->salary);
        });
    }
}
