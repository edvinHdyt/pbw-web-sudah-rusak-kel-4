<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display the customer landing and tracking page.
     */
    public function index(Request $request)
    {
        $resi = $request->query('resi', $request->query('search'));
        $service = null;
        $error = null;

        if ($resi) {
            // Clean up resi query (remove leading '#' and trim spaces)
            $cleanResi = trim(ltrim($resi, '#'));

            $service = Service::where('no_resi', $cleanResi)
                ->orWhere('no_resi', $resi)
                ->first();

            if (!$service) {
                $error = 'Nomor resi #' . $cleanResi . ' tidak ditemukan. Pastikan nomor resi yang Anda masukkan benar.';
            }
        }

        return view('customer.index', compact('service', 'resi', 'error'));
    }

    /**
     * Update customer confirmation (Status Perbaikan & Pengantaran).
     */
    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'status_perbaikan' => ['required', 'string', 'in:Menunggu Konfirmasi,Setuju Perbaikan,Batalkan Perbaikan'],
            'pengantaran' => ['required', 'string', 'in:Diantar,Ambil Sendiri'],
        ]);

        $service->status_perbaikan = $validated['status_perbaikan'];
        $service->pengantaran = $validated['pengantaran'];

        // Sesuai note dari wireframe:
        // "Kalo customer milih batalkan biaya akan berubah menjadi 50.000 / Biaya konsul"
        if ($validated['status_perbaikan'] === 'Batalkan Perbaikan') {
            $service->biaya_perbaikan = $service->biaya_konsul ?: 50000;
        } else {
            // Jika memilih setuju dan sebelumnya 50000, kembalikan ke biaya estimasi perbaikan
            if ($service->biaya_perbaikan <= 50000) {
                $service->biaya_perbaikan = 300000;
            }
        }

        $service->save();

        return redirect()->route('customer.index', ['resi' => $service->no_resi])
            ->with('success', 'Keputusan perbaikan dan opsi pengantaran berhasil disimpan!');
    }
}
