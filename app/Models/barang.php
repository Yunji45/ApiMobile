<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pengiriman;

class barang extends Model
{
    use HasFactory;
    protected $table = 'barangs';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'stok_barang',
        'deskripsi',
        'harga_barang',
    ];

    public function pengiriman()
    {
        return $this->hasMany(pengiriman::class);
    }
}
