<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cms extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description', 'user_id'];

    public function cmsDetails(): HasMany
    {
        return $this->hasMany(cms_detail::class);
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function ($cm) {
            $cm->cmsDetails->each->delete();
        });
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
