<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function getReservations() {

        $response= Http::get('http://127.0.0.1:8081/api/reservas'); 


        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 200);
    }

    
}
