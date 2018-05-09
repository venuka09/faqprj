<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use Facebook\WebDriver\WebDriverBy;

class HomeTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testHome()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit("/login");
            $driver = $browser->driver;

            $email = $driver->findElement(WebDriverBy::id("email"))->sendKeys("test@test.com");
            $password = $driver->findElement(WebDriverBy::id("password"))->sendKeys("testtest");
            $driver->findElement(WebDriverBy::id("login-button"))->click();
            $browser->assertSee("Home");
        });
    }
}
