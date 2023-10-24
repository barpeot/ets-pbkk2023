<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = ['nama', 'jenis', 'kondisi', 'keterangan', 'kecacatan', 'jumlah', 'gambar'];

    public function jenis(){
        return $this->belongsTo(Kategori::class, 'jenis');
    }

}
