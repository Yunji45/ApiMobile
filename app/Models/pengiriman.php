<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lokasi;
use App\Models\User;
use App\Models\barang;

class pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengirimen';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_pengiriman',
        'tanggal',
        'lokasi_id',
        'barang_id',
        'jumlah_barang',
        'harga_barang',
        'kurir_id',
    ];

    public function lokasi()
    {
        return $this->belongsTo(lokasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function barang()
    {
        return $this->belongsTo(barang::class);
    }


}
