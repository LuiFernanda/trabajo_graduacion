<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estado extends Model
{
    protected $fillable = ['estado', 'cuarentena', 'id_persona'];

}
