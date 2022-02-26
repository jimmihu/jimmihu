<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon_H extends Model
{
    use HasFactory;

    protected $table = 'diskon_h';
    protected $primaryKey = 'nosurat';
    protected $fillable = ['kdoutlet','awal','akhir'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class,'kdoutlet');
    }

    public function detail()
    {
        return $this->hasMany(Diskon_D::class,'nosurat');
    }
}
