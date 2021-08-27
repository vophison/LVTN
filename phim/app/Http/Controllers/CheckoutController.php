<?php

namespace App\Http\Controllers;


use App\Models\UserLVTN;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use App\Models\khachhang;
use App\Models\suatchieu;
Session_start();
class CheckoutController extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout(){
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
        return view('pages.checkout.login_checkout')->with('theloaiphim',$cate_phim);
    }
    public function add_customer(Request $request){
  
        $this->validate($request,
        [
            'customer_name'=>'required|min:5|max:35',
            'customer_email'    => 'required|email|unique:tbl_customer,customer_email',
            'customer_password'             => 'required|min:5|max:20',
            'customer_phone'    => 'required|regex:/(0)[0-9]{9}/', // bắt đầu là số 0 chỉ dx từ 0-9 ,kèm theo 9 số phía sau


        ],
        [
            'customer_email.required'       => ' Bạn chưa nhập email.',
            'customer_email.email'          => 'Email không đúng định dạng',
            'customer_email.unique'         => 'Email đã có người sử dụng',
            'customer_name.required'  => 'Bạn chưa nhập họ tên ',
            'customer_name.min'       => ' họ tên ít nhất 5 ký tự ',
            'customer_name.max'       => ' họ tên nhiều nhất 35 ký tự',
            'customer_phone.required'    => 'Bạn chưa nhập số điện thoại ',
        
            'customer_phone.regex'       => 'Số điện thoại phải bắt đầu từ số 0 và quy định bởi 10 số',
            'customer_password.required'    => 'Bạn nhập mật khẩu.',
            'customer_password.min'         => 'Mật khẩu ít nhất 5 ký tự.',
            'customer_password.max'         => 'Mật khẩu nhiều nhất 20 ký tự.',
            
        ]);

        $data= array();
        
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_password'] = $request->customer_password;
        $data['customer_phone'] = $request->customer_phone;
        $data['trangthai']=0;

        $customer_id = DB::table('tbl_customer')->insertGetId($data);
        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_name);        
           //Send mail confirm register
        $email = $data['customer_email'];
        $messageData=[
            'customer_email' => $data['customer_email'],
            'customer_name' => $data['customer_name'],
            'code' => base64_encode($data['customer_email']), // phuc vu cho viec luu tru
        ];
        Mail::send('pages.view_mail.confirm_register',$messageData,function($message)use($email){
            $message->to($email)->subject('Xác nhận đăng ký tài khoản tại website Tiki-Lazada');
        });
        return redirect('login-checkout')->with('thanhcong_mail', 'Vui lòng kiểm tra email của bạn để hoàn tất việc đăng ký tài khoản');

    }
    public function logout_checkout(){
        Session::flush();
        return Redirect('/login-checkout');
    }
    public function login_customer(Request $request){
        $email = $request ->email_account;
        $password = $request->password_account;
        $result = DB::table('tbl_customer')->where('customer_email',$email)->where('customer_password',$password)->first();
        
        if($result){

        if($result->trangthai == 0)
        {
            return redirect()->back()->with(['waiting_active' => 'Tài khoản của bạn chưa được kích hoạt, vui lòng xác nhận mail để hoàn tất việc đăng ký!!!!']);
        } 
        else if($result->trangthai == 1)
        {
            
            $request->session()->put('data', $request->input());
            
        }
        else
         {
        return redirect()->back()->with(['message' => 'Sai tài khoản mật hoặc khẩu']);}
        Session::put('customer_id',$result->customer_id);    
        Session::put('customer_name',$result->customer_name);  
        
            return Redirect::to('/trangchu');
        } else {
            return Redirect::to('/login-checkout');
        }
     
    
    }
    public function thongtinkh($id){
        // dd($_POST);
        // $all_kh = DB:: table('tbl_customer')->get();
        // return view('pages.thongtinkh')->with('all_kh',$all_kh);
        $khachhang=khachhang::find($id);
       
        return view('pages.checkout.thongtinkhachhang' ,['khachhang'=>$khachhang]);
    }


    public function get_Suathongtin($id)
    {
        $khachhang=khachhang::find($id);
        return view('pages.checkout.suathongtinkhachhang',['khachhang'=>$khachhang]);
    }

    public function post_Suathongtin(Request $req ,$id)
    {
        // dd($_POST);
        $this->validate($req,
        [
            'customer_name'=>'bail|required',
            'customer_phone'=>'bail|min:9|max:15|required|unique:tbl_customer,customer_phone,'.$id.',customer_id',
            'customer_password'=>'bail|min:6|max:20|required|:tbl_customer,customer_password,'.$id.',customer_id'
        ],
        [
            'customer_name.required'=>'Họ tên không được để trống',
            'customer_phone.required'=>'Số điện thoại không được để trống',
            'customer_phone.min'=>'Số điện thoại không được ít hơn 9 và nhiều hơn 15 kí tự',
            'customer_phone.max'=>'Số điện thoại không được ít hơn 9 và nhiều hơn 15 kí tự',
            'customer_phone.unique'=>'Số điện thoại không được trùng',
           
            'customer_password.required'=>'mat khau không được bỏ trống',
            'customer_password.min'=>'Mật khẩu yêu cầu 6 ký tự trở lên',
            'customer_password.max'=>'Mật khẩu không quá 20 ký tự'
        ]);
        $khachhang=khachhang::find($id);
        $khachhang->customer_email=$req->customer_email;
        $khachhang->customer_name=$req->customer_name;
        $khachhang->customer_phone=$req->customer_phone;
        $khachhang->customer_password=$req->customer_password;
        $khachhang->update();
        return redirect()->back()->with('thanhcong','Sửa thông tin thành công'); 
    }
    
    public function checkout(Request $request){
        $phim_id= $request->phimid_hidden; //phimid_hidden la lay cai ma phim
        $phong_rap = $request->phong_rap;
        $test=$request->chongoinguoixem;
        $suatchieu= $request->suatchieu; 
        $khachhang= DB::table('tbl_customer')->where('customer_id','=',session('customer_id'))->first();
        $tenphim = DB::table('tbl_phim')
        ->join('tbl_suatchieu','tbl_suatchieu.phim_id' ,'=','tbl_phim.phim_id')
        ->join('tbl_phong','tbl_phong.phong_id','=','tbl_suatchieu.phong_id')
        ->join('tbl_rap','tbl_phong.rap_id','=','tbl_rap.rap_id')
        ->where('tbl_phim.phim_id','=',$phim_id)
        ->where('tbl_suatchieu.suatchieu_id','=',$suatchieu)
        ->select('phim_name','tbl_suatchieu.suatchieu_date','tbl_suatchieu.suatchieu_time',
        'tbl_suatchieu.phong_id','tbl_phong.phong_name','tbl_suatchieu.suatchieu_gia','tbl_rap.rap_name','tbl_suatchieu.suatchieu_id',
        'tbl_phong.phong_id','tbl_rap.rap_id','tbl_phim.phim_id')->first();
        
        $tenrap = $tenphim->rap_name;
        $tenphong = $tenphim->phong_name;
        return view('pages.checkout.show_checkout')
        ->with('tenphim',$tenphim)
        ->with('test',$test)
        ->with('khachhang',$khachhang);
    }
   
    public function hoanthanh_datve(Request $request){
        
        $data=array();
        $chontt=$request->chontt;
        $phim_id=$request->phim_id;
        $phong_rap=$request->phong_rap;//rap
        $suatchieu_id=$request->suatchieu_id;
        $phong_kho=$request->phong_kho;//phong
        $test = $request->chongoinguoixem;
        $time1 = (Carbon::now('Asia/Ho_Chi_Minh')->addHour(-1)->format('Y-m-d H:i:s'));
        $time= Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d H:i:s');
        $phimid_hidden=$request->phimid_hidden;
        $suatchieu=  DB::table('tbl_suatchieu')  
        ->join('tbl_phong','tbl_suatchieu.phong_id','tbl_phong.phong_id')
        ->join('tbl_rap','tbl_phong.rap_id','tbl_rap.rap_id')
        ->join('tbl_phim','tbl_phim.phim_id','tbl_suatchieu.phim_id')
        ->where('tbl_phim.phim_id','=',$phim_id)
        ->where('tbl_suatchieu.suatchieu_id','=',$suatchieu_id)
        ->first();
        $soluong = count($test);
        $data['customer_id'] = Session::get('customer_id');
        $data['suatchieu_id']=$suatchieu_id;
        $data['phim_id']=$phim_id;
        $data['rap_id']=$phong_rap;
        $data['phong_id']=$phong_kho;
        $data['ve_gia']= $suatchieu->suatchieu_gia*$soluong;
        $data['ve_ngay']=$suatchieu->suatchieu_date;
        $data['chontt']=$chontt;
        $ve = DB::table('tbl_ve')->insert($data); 
        // dd($ve);
        // dd($soluong);
        if($chontt==1)
        {
            $tongtien = $suatchieu->suatchieu_gia*$soluong;
            
            $idve=db::table('tbl_ve')->orderby('tbl_ve.ve_id','desc')->first();
            foreach($test as $value )
            {
                $data1['ve_id']=$idve->ve_id;
                $data1['chongoi']=$value;
                DB::table('chitietve')->insert($data1); 
            }
            return view('pages.vnpay.thanhtoanonline')->with('tongtien',$tongtien);
            
        }
        
        $idve=db::table('tbl_ve')->orderby('tbl_ve.ve_id','desc')->first();
       
        foreach($test as $value ){
            $data1['ve_id']=$idve->ve_id;
            $data1['chongoi']=$value;
            DB::table('chitietve')->insert($data1); 
        }
        return view('pages.checkout.hoanthanh_datve');
    }
   
  public function manager_ve(){
        $this->AuthLogin();
        $all_ve = DB::table('tbl_ve')
        ->join('tbl_customer','tbl_ve.customer_id','=','tbl_customer.customer_id')
        ->select('tbl_ve.*','tbl_customer.customer_name') 
        ->orderby('tbl_ve.ve_id','desc')->get();
        $manager_ve = view('admin.manager_ve')->with('all_ve',$all_ve);
        return view('admin_layout')->with('admin.manager_ve',$manager_ve);
    } 
    public function view_ve($veId){
       
        $this->AuthLogin();
        $ve_by_id = DB::table('tbl_ve')
        ->join('tbl_customer','tbl_ve.customer_id','=','tbl_customer.customer_id')
        ->join('chitietve','chitietve.ve_id','=','tbl_ve.ve_id')
        ->join('tbl_phim','tbl_phim.phim_id','=','tbl_ve.phim_id')
        ->join('tbl_suatchieu','tbl_suatchieu.suatchieu_id','=','tbl_ve.suatchieu_id')
        ->join('tbl_phong','tbl_phong.phong_id','=','tbl_ve.phong_id')
        ->join('tbl_rap','tbl_rap.rap_id','=','tbl_ve.rap_id')
        ->select('tbl_ve.*','tbl_customer.customer_name','chitietve.chongoi','tbl_phim.phim_name',
        'tbl_suatchieu.suatchieu_date','tbl_suatchieu.suatchieu_time','tbl_phong.phong_name','tbl_rap.rap_name'
        ,'tbl_customer.*')
        ->where('tbl_ve.ve_id','=',$veId) ->first();
       
        $manager_ve_by_id = view('admin.view_ve')->with('ve_by_id',$ve_by_id);
      
        return view('admin_layout')->with('admin.view_ve',$manager_ve_by_id);
    }
    public function manager_khachhang(){
        $this->AuthLogin();
        $all_kh = DB::table('tbl_customer')->get();
        $manager_khachhang = view('admin.manager_khachhang')->with('all_kh',$all_kh);
        return view('admin_layout')->with('admin.manager_khachhhang',$manager_khachhang);
    } 
    public function createPayment(Request $req)
    {
        $vnp_Url = "http://sandbox.vnpayment.vn/paymentv2/vpcpay.html/";
        $vnp_Returnurl = route('vnpay.return');
        $vnp_TmnCode = "ZZY5L1MP";//Mã website tại VNPAY 
        $vnp_HashSecret = "HUCTTIIGHMDSJVIMONDZEZDWVYEMPKEX"; //Chuỗi bí mật
         $vnp_TxnRef =date('YmdHis');//Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
         $vnp_OrderInfo = $req->order_desc;
         $vnp_OrderType = $req->order_type;
         $vnp_Amount = $_POST['amount'] * 100;
         $vnp_Locale = $req->language;
         $vnp_BankCode = $req->bank_code;
         $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,//them ben env
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );
       // dd($vnp_Returnurl);
        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        
        $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256',$vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
       // dd($vnp_Url);
       return redirect($vnp_Url);
     
    }
    public function vnpayReturn(Request $req)
    {
        //dd($req->toArray());
        // Session()->put('hoten',$req->hoten);
         return redirect()->to('trangchu')->with('thongbao','Đơn hàng đã thanh toán thành công');
    }
}
