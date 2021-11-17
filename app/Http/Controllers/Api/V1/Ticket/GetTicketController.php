<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\JsonResponse;

class GetTicketController extends Controller
{
    public function __invoke(Ticket $ticket): JsonResponse
    {
        return response()->json($ticket->toArray());
    }
}
