<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_H extends Model
{
    use HasFactory;

    protected $table = 'order_h';
    protected $primaryKey = 'noorder';
    protected $fillable = ['tanggal','kdoutlet','lunas','totalbayar'];
}
