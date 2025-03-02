<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class EventController extends Controller
{

    //Metodo el cual permite listar y mostrar todo lo que incluye la BD
    public function index()
    {
        $event = Event::all(); //Creamos esta variable para asociarla al modelo "Event" y con "::all" llamamos todos los datos de esta BD

        return response()->json([
            'status' => 'success',
            'data' => $event
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //En este bloque lo que se realiza es que se crean las validaciones para la hora de ingresar los valores estos sean validos para la bd 
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date',
            'capacity' => 'integer|required|min:10',
            'location' => 'required|max:100'
        ]);

        $event = Event::create($request->all()); //Se crea la variable eventos los cuales se le cargan los datos   -> se enlaza event y se le da el metodo de crear y luego se le pasan los valores los cuales seran añadidos a la bd y luego se destina cual de estos valores en este caso "All" porque seran todos

        return response()->json([
            'status' => 'success',
            'data' => $event
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);

        return response()->json([
            'status' => 'success',
            'data' => $event
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //En este bloque como estamos realizando una actualizacion, requerimos nuevamente tener las validaciones para cada campo
        $request->validate([
            'name' => 'required|string|max:30',
            'description' => 'nullable|string|max:100',
            'date' => 'required|date',
            'capacity' => 'integer|required|min:10',
            'location' => 'required|max:100'
        ]);


        $event->update($request->all()); //Este metodo nos permiite actualizar un dato

        return response()->json([
            'status' => 'success',
            'message' => 'Evento actualizado correctamente',
            'data' => $event
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {

        $event->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Evento eliminado exitosamente',
            'data' => $event
        ], 200);
    }
}
