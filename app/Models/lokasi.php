<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\pengiriman;

class lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
    ];

    public function pengiriman()
    {
        return $this->hasMany(pengiriman::class);
    }

}
