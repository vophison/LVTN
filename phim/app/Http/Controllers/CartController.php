<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;
use Carbon\Carbon;
Session_start();
class CartController extends Controller
{
    public function order_cart(Request $request ){
    //    dd($_POST);
    // dd($request->all());
        $phimid= $request->phimid_hidden; 
        $phim_info = DB::table('tbl_phim')->where('phim_id',$phimid)->first();
        $thoigian = Carbon::now('Asia/Ho_Chi_Minh')->format("Y-m-d");
        $DB = DB::table('tbl_thanhpho')
        ->distinct('tbl_thanhpho.thanhpho_name')
        ->join('tbl_rap','tbl_rap.thanhpho_id','tbl_thanhpho.thanhpho_id')
        ->join('tbl_phong','tbl_phong.rap_id','tbl_rap.rap_id')
        ->join('tbl_suatchieu','tbl_suatchieu.phong_id','tbl_phong.phong_id')
        ->join('tbl_phim','tbl_phim.phim_id','tbl_suatchieu.phim_id')
        ->where('tbl_phim.phim_id',$phimid)
        ->get();
            
        foreach($DB as $value)
        {
            $cate_thanhpho[$value->thanhpho_id]=$value->thanhpho_name;
           
        }
      
        return view('pages.cart.order_cart')
        ->with('cate_thanhpho',$cate_thanhpho)
        ->with('phim_info',$phim_info);
    }
    public function order_ghe(Request $request){
        $test= DB::table('tbl_customer')->where('customer_id','=',session('customer_id'))->first();
        $phimid_hidden=$request->phimid_hidden;
        $phong_rap = $request->phong_rap;
        $suatchieu= $request->suatchieu_date;
       // khong lay được phong
     $layidphong = DB::table('tbl_phong')->join('tbl_suatchieu','tbl_suatchieu.phong_id','=','tbl_phong.phong_id')
     ->Where('tbl_suatchieu.suatchieu_id','=', $suatchieu)
     ->select('cot','hang','tbl_phong.phong_id')->first();  //->where('tbl_phong.phong_id','=',$phong_kho)

    //  dd($layidphong);
    $layghe=DB::table('tbl_ve')
    ->join('tbl_phim','tbl_phim.phim_id','=','tbl_ve.phim_id')
    ->join('tbl_suatchieu','tbl_suatchieu.suatchieu_id','=','tbl_ve.suatchieu_id')
    ->join('tbl_phong','tbl_phong.phong_id','=','tbl_ve.phong_id')
    ->join('tbl_rap','tbl_rap.rap_id','=','tbl_ve.rap_id')
    ->join('chitietve','chitietve.ve_id','=','tbl_ve.ve_id')
    ->Where('tbl_suatchieu.suatchieu_id','=', $suatchieu)
    ->where('tbl_phong.phong_id','=',$layidphong->phong_id)
    
      ->Where('tbl_rap.rap_id','=', $phong_rap)
     ->Where('tbl_phim.phim_id','=', $phimid_hidden)
    
    ->get();
    
    if(count($layghe)<=0)
    {

     $cho=[];
    }

        foreach($layghe as $lay)
        {
            $cho[]=$lay->chongoi;
        }
        $tong = count($cho);
        $soghe=( $layidphong->cot *  $layidphong->hang) - $tong;
        $tongghe = $layidphong->cot *  $layidphong->hang;
        $hang=$layidphong->hang;
        $cot=$layidphong->cot ;
        return view('pages.cart.order_datghe')->with('soghe',$soghe)->with('cho',$cho)->with('tongghe',$tongghe)
        ->with('phimid_hidden',$phimid_hidden)
        ->with('phong_rap',$phong_rap)
        ->with('test',$test)
        ->with('suatchieu',$suatchieu)
        ->with('hang',$hang)
        ->with('cot',$cot);

    }
    public function show_vedat(Request $request){
        $all_ve = DB::table('tbl_ve')
        ->join('tbl_customer','tbl_ve.customer_id','=','tbl_customer.customer_id')
        ->join('chitietve','chitietve.ve_id','=','tbl_ve.ve_id')
        ->join('tbl_phim','tbl_phim.phim_id','=','tbl_ve.phim_id')
        ->join('tbl_suatchieu','tbl_suatchieu.suatchieu_id','=','tbl_ve.suatchieu_id')
        ->join('tbl_phong','tbl_phong.phong_id','=','tbl_ve.phong_id')
        ->join('tbl_rap','tbl_rap.rap_id','=','tbl_ve.rap_id')
        ->select('tbl_ve.*','tbl_customer.customer_name','chitietve.chongoi','tbl_phim.phim_name',
        'tbl_suatchieu.suatchieu_date','tbl_suatchieu.suatchieu_time','tbl_phong.phong_name',
        'tbl_rap.rap_name','tbl_ve.ve_id','tbl_ve.chontt')
        ->where('tbl_customer.customer_email', session('data')['email_account'])
        ->orderby('tbl_ve.ve_id','desc')->get();
        
        return view('pages.cart.show-vedat')->with('all_ve',$all_ve);
    }
    public function delete_vedat($ve_id)
    {
        $xoave=DB::table('tbl_ve')->where('ve_id',$ve_id)->first();
        
        if($xoave->chontt==1){
            return redirect()->back()->with('thongbaoloi','Vé đã thanh toán không được hủy');

        }
        else{
            $xoave=DB::table('tbl_ve')->where('ve_id',$ve_id)->delete();
            
            return redirect('/show-vedat')->with('thongbao','Vé của bạn đã được hủy');
         } 
    }
    public function delete_vedatadmin($ve_id)
    {

        
        $xoave=DB::table('tbl_ve')->where('ve_id',$ve_id)->first();
        
        if($xoave->chontt==1){
            return redirect()->back()->with('thongbaoloi','Vé đã thanh toán không được hủy');

        }
        else{
            $xoave=DB::table('tbl_ve')->where('ve_id',$ve_id)->delete();
            
            return redirect('/manager-ve')->with('thongbao','Vé đã được hủy');
         } 
    }
  
    public function show_thongtinkhachhang(Request $request){
        $thongtin= DB::table('tbl_customer')->get();
        return view('pages.checkout.thongtinkhachhang')->with('thongtin',$thongtin);
    }
}
