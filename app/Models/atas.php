<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atas extends Model
{
    use HasFactory;

    // RELACIONAMENTO DAS TABELAS
    public function users()
    {
        return $this->belongsToMany(users::class);
    }
}
