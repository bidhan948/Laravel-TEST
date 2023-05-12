<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cms_detail extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'cms_id', 'description'];

    public function Cms(): BelongsTo
    {
        return $this->belongsTo(cms::class);
    }
}
