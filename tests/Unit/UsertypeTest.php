<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UsertypeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testType()
    {
        $user = User::inRandomOrder()->first();
        $type = $user->type;
        $this->assertContains($type, ["admin", "member"]);
    }
}
