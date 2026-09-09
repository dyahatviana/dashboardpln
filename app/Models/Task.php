<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Task extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'id_pelanggan',
        'no_ktp',
        'no_kk',
        'no_hp',
        'alamat',
        'keperluan',
        'deskripsi',
        'divisi',
        'prioritas',
        'status',
        'deadline',
        'created_by',
    ];

    protected $casts = [
        'deadline' => 'date',
    ];

    /**
     * User/CS yang membuat tugas.
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
