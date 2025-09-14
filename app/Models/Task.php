<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    use HasFactory;

    /**
     * Tentukan kolom mana yang BOLEH diisi secara massal (via form).
     * user_id harus ada di sini.
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
    ];

    /**
     * Definisikan relasi: Satu Task HANYA "BelongsTo" (Dimiliki oleh) satu User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}