<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\UpdateTicketRequest;

class UpdateTicketController extends Controller
{
    public function __invoke(Ticket $ticket, UpdateTicketRequest $request): JsonResponse
    {
        $ticket->title = $request->get('title');
        $ticket->description = $request->get('description');
        $ticket->column = $request->get('column');

        $ticket->save();

        return response()->json($ticket->toArray());
    }
}
