<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avisos extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(users::class);
    }

}
