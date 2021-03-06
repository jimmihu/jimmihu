<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    protected $primaryKey = 'kdproduk';
    protected $fillable = ['nmproduk','hna'];

    public function diskon()
    {
        return $this->hasMany(Diskon_D::class);
    }
}
