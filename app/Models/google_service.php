<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class google_service extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'token'
    ];


    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
