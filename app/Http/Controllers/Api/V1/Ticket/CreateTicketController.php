<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class CreateTicketController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $ticket = new Ticket($request->all());

        if (!$ticket->save()) {
            return response()->json(
                [
                    'message' => 'Ticket could not be created',
                    'errors' => $ticket->getErrors()
                ],
                422
            );
        }

        return response()->json(['success' => true], SymphonyResponse::HTTP_OK);
    }
}
