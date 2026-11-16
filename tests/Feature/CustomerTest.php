<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    public function test_customer_page_can_be_accessed_without_login(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('SudahRusak');
        $response->assertSee('Lacak Service');
        $response->assertSee('Tentang Kami');
    }

    public function test_customer_can_track_service_with_valid_receipt_number(): void
    {
        $service = Service::create([
            'no_resi' => '6X752',
            'nama_customer' => 'John Doe',
            'no_telpon' => '081234567890',
            'alamat' => 'Bekasi',
            'jenis_perangkat' => 'Laptop - Lenovo LOQ 2022',
            'keluhan' => 'Keyboard Rusak',
            'masalah_ditemukan' => 'Keyboard rusak & Engsel retak',
            'tahap' => 2,
            'status_perbaikan' => 'Menunggu Konfirmasi',
            'pengantaran' => 'Diantar',
            'biaya_perbaikan' => 300000,
            'biaya_konsul' => 50000,
        ]);

        // Search with exact resi
        $response = $this->get('/?resi=6X752');
        $response->assertStatus(200);
        $response->assertSee('PESANAN');
        $response->assertSee('#6X752');
        $response->assertSee('John Doe');
        $response->assertSee('Laptop - Lenovo LOQ 2022');

        // Search with '#' prefix
        $responseHash = $this->get('/?resi=%236X752');
        $responseHash->assertStatus(200);
        $responseHash->assertSee('John Doe');
    }

    public function test_customer_sees_error_for_invalid_receipt_number(): void
    {
        $response = $this->get('/?resi=INVALID123');

        $response->assertStatus(200);
        $response->assertSee('tidak ditemukan');
    }

    public function test_customer_can_update_confirmation_and_delivery_method(): void
    {
        $service = Service::create([
            'no_resi' => '6X752',
            'nama_customer' => 'John Doe',
            'jenis_perangkat' => 'Laptop - Lenovo LOQ 2022',
            'keluhan' => 'Keyboard Rusak',
            'tahap' => 2,
            'status_perbaikan' => 'Menunggu Konfirmasi',
            'pengantaran' => 'Diantar',
            'biaya_perbaikan' => 300000,
            'biaya_konsul' => 50000,
        ]);

        $response = $this->post(route('customer.update', $service->id), [
            'status_perbaikan' => 'Setuju Perbaikan',
            'pengantaran' => 'Ambil Sendiri',
        ]);

        $response->assertRedirect(route('customer.index', ['resi' => '6X752']));
        $this->assertDatabaseHas('services', [
            'id' => $service->id,
            'status_perbaikan' => 'Setuju Perbaikan',
            'pengantaran' => 'Ambil Sendiri',
        ]);
    }

    public function test_canceling_service_changes_cost_to_consultation_fee(): void
    {
        $service = Service::create([
            'no_resi' => '6X752',
            'nama_customer' => 'John Doe',
            'jenis_perangkat' => 'Laptop - Lenovo LOQ 2022',
            'keluhan' => 'Keyboard Rusak',
            'tahap' => 2,
            'status_perbaikan' => 'Menunggu Konfirmasi',
            'pengantaran' => 'Diantar',
            'biaya_perbaikan' => 300000,
            'biaya_konsul' => 50000,
        ]);

        // Customer chooses 'Batalkan Perbaikan'
        $response = $this->post(route('customer.update', $service->id), [
            'status_perbaikan' => 'Batalkan Perbaikan',
            'pengantaran' => 'Diantar',
        ]);

        $response->assertRedirect(route('customer.index', ['resi' => '6X752']));

        $service->refresh();
        $this->assertEquals('Batalkan Perbaikan', $service->status_perbaikan);
        // Biaya berubah menjadi 50.000 / Biaya konsul
        $this->assertEquals(50000, $service->biaya_perbaikan);
    }
}
