<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\CanResetPassword;


class UserLVTN extends Model
{
   protected $table ="tbl_customer";
   protected $primarykey='customer_id';
   protected $fillable =['customer_name',' customer_email','customer_password','trangthai'];
  
}
