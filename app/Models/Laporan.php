<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $primaryKey = 'id_laporan';

    protected $fillable = ['id_penjualan', 'id_pembayaran', 'id_stok', 'id_histori_stok', 'kode_ikan'];
}
