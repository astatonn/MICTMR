<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saida_fins extends Model
{
    
    protected $table = "saida_fins";
    
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
