<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    public $timestamps = false;
    protected $table = "tbl_customer";
    protected $primaryKey ="customer_id";
    protected $keyType = 'string'; 
}