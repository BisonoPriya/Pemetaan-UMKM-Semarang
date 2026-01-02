<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UMKM extends Model
{
protected $table = 'umkm';
    protected $fillable = [
    'nama_umkm',
    'nama_pemilik',
    'alamat',
    'rt',
    'rw',
    'kelurahan',
    'kecamatan',
    'kategori_id',
    'deskripsi',
    'bahan_baku',
    'alat_produksi',
    'latitude',
    'longitude'
];

    public function kategori()
    {
        return $this->belongsTo(KategoriUMKM::class, 'kategori_id');
    }
}
