<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class cms extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function cmsDetails(): HasMany
    {
        return $this->hasMany(cms_detail::class);
    }
}
