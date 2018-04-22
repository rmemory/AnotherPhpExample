<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Check to see we see the title.
     *
     * @return void
     */
    public function testTitleTest()
    {
        $response = $this->get('/')->assertSee('The Bootstrap Blog');
    }
}
