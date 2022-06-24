<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table='users';
    protected $primaryKey= 'u_id';

    public function vendor()
    {
        return $this->hasMany(vendor::class,'vendor_id','u_id');
    }

    public function customer()
    {
        return $this->hasMany(customer::class,'customer_id','u_id');
    }

    public function courier()
    {
        return $this->hasMany(courier::class,'courier_id','u_id');
    }

    public function manager()
    {
        return $this->hasMany(manager::class,'manager_id','u_id');
    }
}
