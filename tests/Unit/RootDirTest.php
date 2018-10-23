<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;

class RootDirTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTitle()
    {
        $response = $this->get('/')->assertSee('Test App');
    }

    public function testLoginLink()
    {
        $this->get('/')->assertSee('Login');
    }

    public function testGihubLink()
    {
        $this->get('/')->assertSee('Code on GitHub');
    }

    public function testLaravelLink()
    {
        $this->get('/')->assertSee('Laravel Documentation');
    }
}
