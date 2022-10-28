<?php

namespace App\Http\Controllers\WebAuth;

use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
//use App\Services\TicketService;

class TicketController extends Controller
{
    //public function index(TicketService $ticketService
    public function index()
    {
        //return response()->json(TicketResource::collection($ticketService->getOpenTickets()));
        return response()->json([
            'access_token'=>'lolis',
            'token_type'=>'Bearer'
        ],201);
    }
}