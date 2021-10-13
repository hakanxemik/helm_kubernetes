<?php

namespace Tests\Unit;

use App\Models\Guest;
use PHPUnit\Framework\TestCase;
use Faker\Generator as Faker;

class GuestTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->assertTrue(true);
    }

    public function guest_get_entries()
    {
        $user = factory(Guest::class)->create();

        $this->actingAs($user, 'api')
            ->get('/api/guestbook/entries')
            ->assertStatus(200)
            ->assertJson($user->toArrray());
    }

    public function gest_post_entries()
    {
        $this->json('POST', '/api/guestbook/entries', ['visitor' => 'Sally', 'title' => 'Test', 'text' => 'Lorem Ipsum'])
            ->seeJson([
                'created' => true,
            ]);
    }
}
