<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $primaryKey = 'e_id';
    protected $fillable = ['e_first_name','e_last_name','e_email','e_phone','c_id'];

    public function company()
    {
        return $this->belongsTo(Company::class,'c_id');
    }
}
