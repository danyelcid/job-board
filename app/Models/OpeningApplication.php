<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OpeningApplication extends Model
{
    use HasFactory;

    public function opening(): BelongsTo
    {
        return $this-> belongsTo(Opening::class);
    }

    public function user(): BelongsTo
    {
        return $this-> belongsTo(User::class);
    }
}
