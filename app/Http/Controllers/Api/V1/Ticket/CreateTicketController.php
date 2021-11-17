<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use App\Http\Requests\CreateTicketRequest;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Symfony\Component\HttpFoundation\Response as SymphonyResponse;

class CreateTicketController extends Controller
{
    public function __invoke(CreateTicketRequest $request): JsonResponse
    {
        $ticket = new Ticket($request->all());

        if (!$ticket->save()) {
            return response()->json(
                [
                    'message' => 'Ticket could not be created',
                    'errors' => $ticket->getErrors()
                ],
                SymphonyResponse::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response()->json(['success' => true], SymphonyResponse::HTTP_OK);
    }
}
