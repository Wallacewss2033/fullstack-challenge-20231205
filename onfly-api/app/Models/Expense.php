<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Expense extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'description',
        'date',
        'user_id',
        'value',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
