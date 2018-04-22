<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    /**
     * Check to see Post::archives works.
     *
     * @return void
     */
    public function testPostArchivesTest()
    {
        // Given, I have two records in the database that are posts,
        // and each one is posted a month apart
        // See database/factories/ModelFactory for default factory,
        // to save dummy data to the database
        // factory('App\Post::class)->make(), note that ->create() will 
        // save it to the database
        $firstPost = factory(Post::class)->create();
        $secondPost = factory(Post::class)->create([
            // created last month
            'created_at' => \Carbon\Carbon::now()->subMonth()
        ]);


        // When I fetch the archives, 
        $posts = Post::archives();

        // Then the response should be in the proper format.
        $this->assertCount(2, $posts);

        $this->assertEquals([
            [
                "year" => $firstPost->created_at->format('Y'),
                "month" => $firstPost->created_at->format('F'),
                "published" => 1
            ],

            [
                "year" => $secondPost->created_at->format('Y'),
                "month" => $secondPost->created_at->format('F'),
                "published" => 1
            ],
        ], $posts);
    }
}
