<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlet';
    protected $primaryKey = 'kdoutlet';
    protected $fillable = ['nmoutlet','alamat','aktif'];

    public function diskon()
    {
        return $this->hasMany(Diskon_H::class,'nosurat');
    }
}
