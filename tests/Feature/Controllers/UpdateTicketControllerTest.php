<?php

use function Pest\Laravel\put;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it(
    'will update with correct information if ticket already exists',
    function () {
        $ticket = Ticket::factory()->create();

        $response = put(
            '/api/ticket/' . $ticket->id,
            [
                'title' => 'New Title',
                'description' => 'New Description',
                'column' => 'New Column',
            ]
        );

        $response->assertStatus(200);
        $response->assertJsonFragment(
            [
                'id' => $ticket->id,
                'title' => 'New Title',
                'description' => 'New Description',
                'column' => 'New Column'
            ]
        );
    }
);

it(
    'will not update if the ticket does not exist',
    function () {
        $response = put(
            '/api/ticket/0',
            [
                'title' => 'New Title',
                'description' => 'New Description',
                'column' => 'New Column',
            ]
        );

        $response->assertStatus(404);
    }
);

it(
    'will reject invalid information',
    function () {
        $ticket = Ticket::factory()->create();

        $response = put(
            "/api/ticket/$ticket->id",
            [
                'name' => 'New Title',
                'description' => 'New Description',
                'column' => 'New Column',
            ]
        );

        $response->assertStatus(\Symfony\Component\HttpFoundation\Response::HTTP_FOUND);
    }
);
