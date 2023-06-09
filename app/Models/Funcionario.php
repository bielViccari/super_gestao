<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'section',
        'function',
        'user_id',
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
