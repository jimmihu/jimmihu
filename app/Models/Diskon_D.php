<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diskon_D extends Model
{
    use HasFactory;

    protected $table = 'diskon_d';
    protected $primaryKey = 'nosurat';
    protected $fillable = ['kdproduk','diskon','min','max'];

    public function header()
    {
        return $this->belongsTo(Diskon_H::class,'nosurat');
    }
}
