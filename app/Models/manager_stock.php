<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class manager_stock extends Model
{

    use HasFactory;
    protected $table='manager_stock';
    public $timestamps = false;
    public function contract()
    {
        return $this->hasMany(contract::class,'contract_id','contract_id');
    }
    public function medicine()
    {
        return $this->hasOne(medicine::class,'med_id','med_id');
    }
}
