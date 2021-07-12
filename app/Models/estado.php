<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class estado extends Model
{
    protected $fillable = ['estado', 'cuarentena', 'persona_id'];
    
    public function persona(){
        return $this->belongsTo("App\Models\persona");
    }
}
