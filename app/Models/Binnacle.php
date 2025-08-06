<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Binnacle extends Model
{
    protected $fillable = [
        'binnacle_type_id',
        'user_id',
        'description',
        'date_register',
        'notes',
    ];

    protected $casts = [
        'date_register' => 'datetime',
    ];

    public function binnacleType(): BelongsTo
    {
        return $this->belongsTo(BinnacleType::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
