<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $table = 'komentars'; // pastikan sesuai nama tabel di database

    protected $fillable = [
        'tugas_id',
        'user_id',
        'isi',
        'parent_id',
    ];

    /**
     * Relasi ke Tugas
     * Satu komentar milik satu tugas.
     */
    public function tugas()
    {
        return $this->belongsTo(Tugas::class);
    }

    /**
     * Relasi ke User
     * Satu komentar ditulis oleh satu user (siswa/guru).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke komentar balasan (anak).
     * Satu komentar bisa punya banyak balasan.
     */
    public function balasan()
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    /**
     * Relasi ke komentar induk.
     * Balasan selalu punya parent.
     */
    public function parent()
    {
        return $this->belongsTo(Komentar::class, 'parent_id');
    }
}
