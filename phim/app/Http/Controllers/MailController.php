<?php

namespace App\Http\Controllers;


use App\Models\UserLVTN;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Password;
use Illuminate\Mail\Message;

class MailController extends Controller
{
      /*Xác nhận đăng ký tài khoản*/
      public function xacNhanEmail($email)
      {
        $email = base64_decode($email); // chuyen doi du lieu luu tru thanh du lieu su dung
        $userCount = UserLVTN::where('customer_email',$email)->count();
        if($userCount>0){
            $cusDetail = UserLVTN::where('customer_email',$email)->first();
            if($cusDetail->trangthai==0){ 
                UserLVTN::where('customer_email',$email)->update(['trangthai'=>1]);
                $msgData=[
                    'customer_name'=>$cusDetail['customer_name'],
                    'customer_email'=>$cusDetail['customer_email']
                 ];
                 return redirect('login-checkout')->with('new_actived','Tài khoản được kích hoạt, vui lòng đăng nhập.');
            }
            else{
                return redirect('login-checkout')->with('actived','Xác nhận thất bại');
            }
        }else{
            abort(404);
        }
      }
}
