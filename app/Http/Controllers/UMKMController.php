<?php

namespace App\Http\Controllers;

use App\Models\UMKM;
use App\Models\KategoriUMKM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class UMKMController extends Controller
{
    public function index()
    {
        $umkm = UMKM::with('kategori')->get();
        return view('umkm.index', compact('umkm'));
    }

    public function create()
    {
        $kategori = KategoriUMKM::all();
        return view('umkm.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_umkm'     => 'required',
            'nama_pemilik'  => 'required',
            'alamat'        => 'required',
            'rt'            => 'required',
            'rw'            => 'required',
            'kelurahan'     => 'required',
            'kecamatan'     => 'required',
            'kategori_id'   => 'required',
            'bahan_baku'    => 'nullable',
            'alat_produksi' => 'nullable',
            'deskripsi'     => 'nullable'
            
        ]);

          $lokasi = $this->geocodeAlamat($request->alamat);

        UMKM::create([
            'nama_umkm'       => $request->nama_umkm,
            'nama_pemilik'    => $request->nama_pemilik,
            'alamat'          => $request->alamat,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'kelurahan'       => $request->kelurahan,
            'kecamatan'       => $request->kecamatan,
            'kategori_id'     => $request->kategori_id,
            'deskripsi'       => $request->deskripsi,
            'bahan_baku'      => $request->bahan_baku,
            'alat_produksi'   => $request->alat_produksi,
            'latitude'      => $lokasi['lat'],
            'longitude'     => $lokasi['lon'],
        ]);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil ditambahkan');
    }


    public function edit($id)
    {
        $umkm = UMKM::findOrFail($id);
        $kategori = KategoriUMKM::all();

        return view('umkm.edit', compact('umkm', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $umkm = UMKM::findOrFail($id);

        $request->validate([
            'nama_umkm'     => 'required',
            'nama_pemilik'  => 'required',
            'alamat'        => 'required',
            'rt'            => 'required',
            'rw'            => 'required',
            'kelurahan'     => 'required',
            'kecamatan'     => 'required',
            'kategori_id'   => 'required',
            'bahan_baku'    => 'nullable',
            'alat_produksi' => 'nullable',
            'deskripsi'     => 'nullable',
           
        ]);

        $lokasi = $this->geocodeAlamat(
        $request->alamat,
        $request->kelurahan,
        $request->kecamatan
        );

        $umkm->update([
            'nama_umkm'       => $request->nama_umkm,
            'nama_pemilik'    => $request->nama_pemilik,
            'alamat'          => $request->alamat,
            'rt'              => $request->rt,
            'rw'              => $request->rw,
            'kelurahan'       => $request->kelurahan,
            'kecamatan'       => $request->kecamatan,
            'kategori_id'     => $request->kategori_id,
            'deskripsi'       => $request->deskripsi,
            'bahan_baku'      => $request->bahan_baku,
            'alat_produksi'   => $request->alat_produksi,
            'latitude'      => $lokasi['lat'],
            'longitude'     => $lokasi['lon'],
        ]);

        return redirect()->route('umkm.index')
            ->with('success', 'Data UMKM berhasil diupdate');
    }


    public function destroy($id)
    {
        UMKM::destroy($id);
        return back()->with('success', 'Data UMKM berhasil dihapus');
    }

    public function dashboard()
{
    $umkm = UMKM::with('kategori')
        ->whereNotNull('latitude')
        ->whereNotNull('longitude')
        ->get();

    $kategori = KategoriUMKM::all();

    return view('dashboard.index', compact('umkm', 'kategori'));
}
   private function geocodeAlamat($alamat, $kelurahan, $kecamatan)
{
    $query = implode(', ', array_filter([
        $alamat,
        $kelurahan,
        $kecamatan,
        'Kota Semarang',
        'Jawa Tengah',
        'Indonesia'
    ]));

    try {
        $response = Http::timeout(8)
            ->withHeaders([
                'User-Agent' => 'UMKM-Semarang/1.0'
            ])
            ->get('https://nominatim.openstreetmap.org/search', [
                'q' => $query,
                'format' => 'json',
                'limit' => 1,
            ]);

        if ($response->successful() && count($response->json()) > 0) {
            return [
                'lat' => $response->json()[0]['lat'],
                'lon' => $response->json()[0]['lon'],
            ];
        }
    } catch (\Exception $e) {
        // log optional
    }

    // Fallback logis: pusat kecamatan / kota
    return [
        'lat' => -6.966667,
        'lon' => 110.416667,
    ];
}
}

