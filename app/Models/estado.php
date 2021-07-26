<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\persona;

class estado extends Model
{
    protected $fillable = ['estado', 'cuarentena', 'persona_id'];
    
    public function persona(){
        return $this->belongsTo(persona::class);
    }
}
