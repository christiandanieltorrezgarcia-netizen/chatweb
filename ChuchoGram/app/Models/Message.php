<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'user_id',
        'mensaje',
        'file_path',
        'file_type',
        'file_name',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}