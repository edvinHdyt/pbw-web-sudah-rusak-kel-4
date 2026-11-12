<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = [
        'no_resi',
        'nama_customer',
        'no_telpon',
        'alamat',
        'jenis_perangkat',
        'keluhan',
        'masalah_ditemukan',
        'tahap',
        'status_perbaikan',
        'pengantaran',
        'biaya_perbaikan',
        'biaya_konsul',
    ];

    protected $casts = [
        'tahap' => 'integer',
        'biaya_perbaikan' => 'float',
        'biaya_konsul' => 'float',
    ];

    public function getTahapLabelAttribute(): string
    {
        return match ($this->tahap) {
            1 => 'Pesanan Dibuat',
            2 => 'Pengecekan Perangkat',
            3 => 'Perbaikan Perangkat',
            4 => 'Perbaikan Selesai',
            default => 'Pesanan Dibuat',
        };
    }

    public function getFormattedBiayaAttribute(): string
    {
        return 'Rp ' . number_format($this->biaya_perbaikan, 0, ',', '.');
    }
}
