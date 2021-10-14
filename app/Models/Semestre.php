<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Semestre extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table = 'semestres';
    protected $fillable =[
        "clave",
        "nombre",
    ];

    protected $dates = [ 'deleted_at' ];
}
