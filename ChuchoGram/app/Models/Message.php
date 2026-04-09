<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'mensaje',
<<<<<<< HEAD
    ];

    /**
     * Relación: un mensaje pertenece a un usuario.
     */
=======
        'file_path',
        'file_type',
        'file_name',
    ];

>>>>>>> origin/master
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}