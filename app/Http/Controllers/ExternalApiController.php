<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExternalApiController extends Controller
{
    public function getReservations()
    {

        $response = Http::get('http://127.0.0.1:8081/api/reservas'); //Api consumida de cristian


        //Toma la respuesta del api y la retorna para mostrarla
        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 200);
    }

//metodo para crear un evento api-consumida de cristian
    public function createReserva(Request $request)
    {

        $request->validate([
            'nombre_usuario' => 'required|string|max:30',
            'nombre_evento' => 'required|string|max:100',
            'numero_entradas' => 'required|integer|min:1|max:10',
        ]);

        $response = Http::post('http://127.0.0.1:8081/api/reservas', [
            'nombre_usuario' => $request->nombre_usuario,
            'nombre_evento' => $request->nombre_evento,
            'numero_entradas' => $request->numero_entradas
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 201);
    }

    

    public function getUsers()//Metodo utilizado para pablo
    {

        $response = Http::get('http://127.0.0.1:8082/api/userservice'); //Api consumida de pablo


        //Toma la respuesta del api y la retorna para mostrarla
        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 200);
    } 

    public function createUser(Request $request)//Metodo utilizado para pablo
    {

        $response = Http::post('http://127.0.0.1:8082/api/userservice', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return response()->json([
            'status' => 'success',
            'data' => $response->json()
        ], 201);


    }
}
