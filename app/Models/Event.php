<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory; //Esta linea nos permite crear datos falsos para llenar nuestra BD y hacer pruebas de que todo okey


    //Esta parte del codigo nos da la seguridad y especificaciones sobre que campos seran completados dentro de la BD
    protected $fillable = [
        'name',
        'description',
        'date',
        'capacity',
        'location'
    ];

    
}
