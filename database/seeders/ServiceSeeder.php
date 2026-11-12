<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Sample order matching the wireframe exactly
        Service::updateOrCreate(
            ['no_resi' => '6X752'],
            [
                'nama_customer' => 'John Doe',
                'no_telpon' => '081234567890',
                'alamat' => 'Jl. Mawar No. 12, Bekasi',
                'jenis_perangkat' => 'Laptop - Lenovo LOQ 2022',
                'keluhan' => 'Keyboard Rusak',
                'masalah_ditemukan' => 'Keyboard rusak - Engsel retak - keluarga miskin - Susah cari kerja - Ukt Mahal - Prabowo presiden - Dolar Naik - Jadi WNI',
                'tahap' => 2, // Pengecekan Perangkat
                'status_perbaikan' => 'Menunggu Konfirmasi',
                'pengantaran' => 'Diantar',
                'biaya_perbaikan' => 300000,
                'biaya_konsul' => 50000,
            ]
        );

        Service::updateOrCreate(
            ['no_resi' => 'SR-001'],
            [
                'nama_customer' => 'Budi Santoso',
                'no_telpon' => '089876543210',
                'alamat' => 'Jl. Melati No. 45, Jakarta',
                'jenis_perangkat' => 'Smartphone - Samsung S21',
                'keluhan' => 'Layar Mati Total',
                'masalah_ditemukan' => 'Sedang dalam antrian pengecekan awal teknisi',
                'tahap' => 1, // Pesanan Dibuat
                'status_perbaikan' => 'Menunggu Konfirmasi',
                'pengantaran' => 'Ambil Sendiri',
                'biaya_perbaikan' => 0,
                'biaya_konsul' => 50000,
            ]
        );

        Service::updateOrCreate(
            ['no_resi' => 'SR-002'],
            [
                'nama_customer' => 'Siti Rahma',
                'no_telpon' => '081345678901',
                'alamat' => 'Jl. Anggrek No. 8, Depok',
                'jenis_perangkat' => 'PC Desktop - Asus ROG',
                'keluhan' => 'Sering Blue Screen & Overheat',
                'masalah_ditemukan' => 'Pasta thermal kering & kipas prosesor macet',
                'tahap' => 3, // Perbaikan Perangkat
                'status_perbaikan' => 'Setuju Perbaikan',
                'pengantaran' => 'Diantar',
                'biaya_perbaikan' => 150000,
                'biaya_konsul' => 50000,
            ]
        );

        Service::updateOrCreate(
            ['no_resi' => 'SR-003'],
            [
                'nama_customer' => 'Ahmad Fauzi',
                'no_telpon' => '087712345678',
                'alamat' => 'Jl. Cendana No. 20, Bogor',
                'jenis_perangkat' => 'Monitor - LG 24 Inch',
                'keluhan' => 'Layar Berkedip & Garis Vertikal',
                'masalah_ditemukan' => 'Kabel fleksibel T-Con diganti baru',
                'tahap' => 4, // Perbaikan Selesai
                'status_perbaikan' => 'Setuju Perbaikan',
                'pengantaran' => 'Ambil Sendiri',
                'biaya_perbaikan' => 120000,
                'biaya_konsul' => 50000,
            ]
        );
    }
}
