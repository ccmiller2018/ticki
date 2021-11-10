<?php

use function Pest\Laravel\post;
use App\Models\Ticket;

it(
    'will accept accurate data',
    function () {
        $this->postJson(
            '/api/ticket',
            [
                'title' => 'Test Ticket',
                'description' => 'This is a test ticket',
                'column' => 'To Do',
            ]
        )->assertStatus(200);

        $retrievedTicket = Ticket::where('title', '=', 'Test Test')->first();

        assert($retrievedTicket->description, 'This is a test ticket');
    }
);

    it(
        'will reject inaccurate data',
        function () {
            $this->postJson(
                '/api/ticket',
                [
                    'name' => 'Test Ticket',
                    'description' => 'This is a test ticket',
                    'column' => 'To Do',
                ]
            )->assertStatus(422);
        }
);
