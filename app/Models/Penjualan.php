<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';

    protected $fillable = ['id_user', 'id_stok', 'id_histori_stok', 'id_pembayaran', 'kode_ikan', 'stok_jual', 'tanggal_jual'];
}
