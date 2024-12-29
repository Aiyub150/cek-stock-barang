<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gambar',
        'kode_barang',
        'artist',
        'jenis',
        'nama_parfum',
        'satuan',
        'stock_awal',
        'promosi',
        'harga',
        'stok_laku',
        'sisa_stok',
        'keterangan',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'kode_barang' => 'integer',
        'stock_awal' => 'integer',
        'harga' => 'integer',
        'stok_laku' => 'integer',
        'sisa_stok' => 'integer',
    ];
}
