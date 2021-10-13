<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrera extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'carreras';
    protected $fillable =[
        "clave",
        "nombre",
    ];

    protected $dates = [ 'deleted_at' ];
}
