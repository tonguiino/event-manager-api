<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function getReservations() {

        $response= Http::get('http://127.0.0.1:8081/api/reservas'); //Api consumida de cristian


        //Toma la respuesta del api y la retorna para mostrarla
        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 200);
    }


}
