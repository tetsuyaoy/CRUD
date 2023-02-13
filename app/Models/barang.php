<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $primaryKey = 'kd_barang';

    protected $fillable = [
        'kd_barang','nm_barang','tipe'
    ];
}
