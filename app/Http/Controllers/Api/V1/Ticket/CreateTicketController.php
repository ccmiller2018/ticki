<?php

namespace App\Http\Controllers\Api\V1\Ticket;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ticket;

class CreateTicketController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $ticket = new Ticket($request->all());

        if (!$ticket->save() instanceOf Ticket) {
            return response()->json(
                [
                    'message' => 'Ticket could not be created',
                    'errors' => $ticket->getErrors()
                ],
                422
            );
        }

        return response()->json(['success' => true], 200);
    }
}
