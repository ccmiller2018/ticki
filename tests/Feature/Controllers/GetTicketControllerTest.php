<?php

use function Pest\Laravel\get;
use App\Models\Ticket;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

    it(
        'will return a json object if a ticket is found',
        function() {
            $ticket = Ticket::factory()->create();

            $response = get('/api/ticket/' . $ticket->id);
            $response->assertStatus(200);
            $response->assertJsonStructure(
                [
                    'id',
                    'title',
                    'description',
                    'column',
                    'created_at',
                    'updated_at',
                ]
            );
        }
    );

    it(
        'will return 404 if no ticket is found',
        function() {
            $response = get('/api/ticket/0');

            $response->assertStatus(404);
        }
    );
