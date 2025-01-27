<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $casts = [
        'done' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sprint()
    {
        return $this->belongsTo(Sprint::class);
    }
}
