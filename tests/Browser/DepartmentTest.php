<?php

namespace Tests\Browser;

use App\Models\Department;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DepartmentTest extends DuskTestCase
{

    public $departmentTitle;
    public $newDepartmentTitle;

    protected function setUp() : void
    {
        parent::setUp();

        $this->departmentTitle = 'Хозяйственный';
        $this->newDepartmentTitle = 'Клининговый';
    }

    public function testCreateNewDepartment()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(51))
                ->visit('/departments')
                ->clickLink('Создать Отдел')
                ->type('title', $this->departmentTitle)
                ->press('Создать')
                ->assertPathIs('/departments')
                ->assertSee($this->departmentTitle);
        });
    }


    public function testUpdateNewDepartment()
    {
        $department = Department::latest()->first();

        $this->browse(function (Browser $browser) use($department) {
            $browser->visit('/departments/' . $department->id . '/edit')
                ->type('title', $this->newDepartmentTitle)
                ->press('Обновить')
                ->assertPathIs('/departments')
                ->assertSee($this->newDepartmentTitle)
                ->assertDontSee($this->departmentTitle);
        });
    }
}
