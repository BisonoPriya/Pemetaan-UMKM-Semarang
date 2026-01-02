<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UMKM;

class KategoriUMKM extends Model
{
 protected $table = 'kategori_umkm';
 protected $fillable = ['nama_kategori'];

 public function umkm()
 {
    return $this->hasMany(UMKM::class, 'kategori_id');
 }
}
