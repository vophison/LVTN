<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class HomeController extends Controller
{ 
    
    public function index(){
        $ngayhientai= Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
        $all_phim = DB::table('tbl_phim')->where('phim_status','0')->orderby('phim_id','desc')->limit(10)->get();
        $phimhomnay = DB::table('tbl_phim')
        ->join('tbl_suatchieu','tbl_suatchieu.phim_id','=','tbl_phim.phim_id')
        ->where('tbl_suatchieu.suatchieu_date','=',$ngayhientai)
        ->where('phim_status','0')
        ->orderby('tbl_phim.phim_id','desc')->limit(10)->get();
        
        // dd($phimhomnay);
        return view('pages.home')
        ->with('phimhomnay',$phimhomnay)
        ->with('ngayhientai',$ngayhientai)
        ->with('theloaiphim',$cate_phim)
        ->with('all_phim',$all_phim);
    }
    public function phimdangchieu(){
      
        
        $ngayhientai= Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $phimhomnay = DB::table('tbl_phim')
        ->join('tbl_suatchieu','tbl_suatchieu.phim_id','=','tbl_phim.phim_id')
        ->where('tbl_suatchieu.suatchieu_date','=',$ngayhientai)
        ->where('phim_status','0')
        ->where('phim_oldnew','1')
        ->select('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
        'tbl_phim.phim_thoiluong')
        ->groupby('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
        'tbl_phim.phim_thoiluong')
        ->orderby('tbl_phim.phim_id','desc')->limit(10)->get();
        
        return view('pages.phimdangchieu')
        ->with('phimhomnay',$phimhomnay)
        ->with('ngayhientai',$ngayhientai);
        
    }
    public function phimsapchieu(){

        $ngayhientai= Carbon::now('Asia/Ho_Chi_Minh')->format('Y-m-d');
        $phimsapchieu = DB::table('tbl_phim')
        ->join('tbl_suatchieu','tbl_suatchieu.phim_id','=','tbl_phim.phim_id')
        ->where('tbl_suatchieu.suatchieu_date','>',$ngayhientai)
        ->where('phim_status','0')
        ->where('phim_oldnew','0')
        ->orderby('tbl_phim.phim_id','desc')->limit(10)->get();
        return view('pages.phimsapchieu')
        ->with('phimsapchieu',$phimsapchieu)
        ->with('ngayhientai',$ngayhientai);
    }
    public function search(Request $request){
      $keywords = $request -> keywords_submit;
      $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
      $search_phim =  DB::table('tbl_phim')
     ->join('tbl_theloaiphim','tbl_theloaiphim.theloaiphim_id','=','tbl_phim.theloaiphim_id')
   
      ->where('phim_name','like','%'.$keywords.'%')
      ->orWhere('theloaiphim_name','like','%'.$keywords.'%')
      ->orWhere('phim_quocgia','like','%'.$keywords.'%')
      ->orWhere('phim_daodien','like','%'.$keywords.'%')
      ->orWhere('phim_dienvien','like','%'.$keywords.'%')
      ->get();
      // dd($keywords);
      return view('pages.phim.search')
      ->with('theloaiphim',$cate_phim)
      ->with('search_phim',$search_phim);
    }
    public function timkiemtheongay(Request $request){
      $ngaychieu = $request ->ngaychieu;
      $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')
      ->orderby('theloaiphim_id','desc')->get(); //the loai
      $search_phim =  DB::table('tbl_phim')
     ->join('tbl_suatchieu','tbl_suatchieu.phim_id','=','tbl_phim.phim_id')
     ->where('suatchieu_date','=',$request->ngaychieu)
     ->where('phim_status','0')->where('phim_oldnew','1')
     ->select('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
        'tbl_phim.phim_thoiluong')
        ->groupby('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
        'tbl_phim.phim_thoiluong')
        ->orderby('tbl_phim.phim_id','desc')->limit(10)->get();
        // dd($ngaychieu);
      return view('pages.phim.timngay')
      ->with('ngaychieu',$ngaychieu)
      ->with('theloaiphim',$cate_phim)
      ->with('search_phim',$search_phim);
      
     
    }
    public function chon_rap_o(Request $request){
      
      $data = $request->all();
      $output = '';
      $rap = DB::table('tbl_rap')  
       ->join('tbl_thanhpho','tbl_rap.thanhpho_id','tbl_thanhpho.thanhpho_id')
      ->join('tbl_phong','tbl_phong.rap_id','tbl_rap.rap_id')
      ->join('tbl_suatchieu','tbl_suatchieu.phong_id','tbl_phong.phong_id')
      ->join('tbl_phim','tbl_phim.phim_id','tbl_suatchieu.phim_id')
      ->where('tbl_thanhpho.thanhpho_id',  $data['thanhpho_id'])
      ->where('tbl_phim.phim_id', $data['phim_id'])
      ->get();
              
      foreach($rap as $value)
      {
          $db[$value->rap_id]=$value->rap_name;
      }
      $output.='
                  <option>--Chọn rạp theo thành phố--</option>
      ';       
                        
      foreach ($db as $key => $value) {
           $output.='<option value="'.$key.'">'.$value.'</option>';
      }
      
      echo $output;

  } 
  public function chon_suatchieu_o(Request $request){
    
    $data = $request->all();
    $output = '';
    //
      $ngay = Carbon::now('Asia/Ho_Chi_Minh')->format("Y-m-d");
      $gio = Carbon::now('Asia/Ho_Chi_Minh')->format("H:i:s");
    //
    $suatchieu = DB::table('tbl_suatchieu')  
    ->join('tbl_phong','tbl_suatchieu.phong_id','tbl_phong.phong_id')
    ->join('tbl_rap','tbl_phong.rap_id','tbl_rap.rap_id')
    ->join('tbl_thanhpho','tbl_rap.thanhpho_id','tbl_thanhpho.thanhpho_id')
    ->join('tbl_phim','tbl_phim.phim_id','tbl_suatchieu.phim_id')
    ->where('tbl_rap.rap_id',   $data['rap_id'])
    ->where('tbl_phim.phim_id', $data['phim_id'])
    ->where('tbl_thanhpho.thanhpho_id',  $data['thanhpho_id'])
   //
    ->where('tbl_suatchieu.suatchieu_date','=',$ngay)
    ->where('tbl_suatchieu.suatchieu_time','>',$gio)
    ->orWhere('tbl_suatchieu.suatchieu_date','>',$ngay)
    //
    ->where('tbl_rap.rap_id',   $data['rap_id'])
    ->where('tbl_phim.phim_id', $data['phim_id'])
    ->where('tbl_thanhpho.thanhpho_id',  $data['thanhpho_id'])
    ->get();
    $output.='
                <option>--Chọn giờ, phòng theo ngày chiếu và rạp--</option>
    ';                                
    foreach ($suatchieu as $key => $value) {
         $output.='<option value="'.$value->suatchieu_id.'">'.$value->suatchieu_time.' '.'Tại '.$value->phong_name.'</option>';
    }
    echo $output;

}
  /* public function chon_phong_o(Request $request){

   $data = $request->all();
   $output = '';
   $phong = DB::table('tbl_phong')->where('suatchieu_id',$data['suatchieu_id'])->get();
    $output.='<select name="phong_cate" class="form-control input-lg m-bot15">
              <option>--Chọn phòng theo suất--</option>
    ';       
    foreach ($phong as $key => $value) {
        $output.='<option value="'.$value->phong_id.'">'.$value->phong_id.'</option>';
   }
   $output.='</select>';
  
   echo $output;

  } */
  
}
