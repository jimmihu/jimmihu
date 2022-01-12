<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $primaryKey = 'c_id';
    protected $fillable = ['c_name','c_email','c_logo','c_website'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
