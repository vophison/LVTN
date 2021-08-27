<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
Session_start();
class suatchieu extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_suatchieu(){
        $this->AuthLogin();   //goi ham o tren
        $cate_dangphim = DB::table('tbl_dangphim')->orderby('dangphim_id','desc')->get();
        $cate_phong = DB::table('tbl_phong')->orderby('phong_id','desc')->get();
        $cate_phim = DB::table('tbl_phim')->orderby('phim_id','desc')->get();
        
        return view('admin.add_suatchieu')->with('cate_dangphim',$cate_dangphim)
        ->with('cate_phong',$cate_phong)->with('cate_phim',$cate_phim);
    }
    public function all_suatchieu(){
        $this->AuthLogin();
        $all_suatchieu =  DB::table('tbl_suatchieu')
        ->join('tbl_dangphim','tbl_dangphim.dangphim_id','=','tbl_suatchieu.dangphim_id')
        ->join('tbl_phim','tbl_phim.phim_id','=','tbl_suatchieu.phim_id')
        ->join('tbl_phong','tbl_phong.phong_id','=','tbl_suatchieu.phong_id')
       
        ->orderby('tbl_suatchieu.suatchieu_id','desc')->get();
        $manager_suatchieu = view('admin.all_suatchieu')->with('all_suatchieu',$all_suatchieu);
        return view('admin_layout')->with('admin.all_suatchieu',$manager_suatchieu);

    }
    public function save_suatchieu(Request $request){
        $this->validate($request,
        [
            'suatchieu_date'=>'required',
            'suatchieu_time'=>'required',
            'suatchieu_gia'=>'required',
            
            
        ],
        [
            'suatchieu_date.required'=>'Ngày không được để trống',
            'suatchieu_time.required'=>'Giờ không được để trống',
            'suatchieu_gia.required'=>'Giá không được để trống',
        ]);
        $this->AuthLogin();
        $data = array();
        $data['dangphim_id'] = $request->phim_dang; 
        $data['phong_id'] = $request->cate_phong;
        $data['phim_id'] = $request->cate_phim;
        $data['suatchieu_time'] = $request->suatchieu_time; 
        $data['suatchieu_date'] = $request->suatchieu_date; 
        $data['suatchieu_gia'] = $request->suatchieu_gia; 
        $thoiluong = DB::table('tbl_phim')->select('tbl_phim.phim_id','tbl_suatchieu.suatchieu_date'
        ,'tbl_suatchieu.suatchieu_time','tbl_phim.phim_thoiluong','tbl_suatchieu.phong_id'
        ,'tbl_phong.phong_id')
       ->join('tbl_suatchieu','tbl_suatchieu.phim_id','tbl_phim.phim_id')
        ->join('tbl_phong','tbl_phong.phong_id','tbl_suatchieu.phong_id')
        ->join('tbl_rap','tbl_rap.rap_id','tbl_phong.rap_id')
        // ->where('tbl_phim.phim_id',$request->cate_phim)
        ->where('tbl_phong.phong_id',$request->cate_phong)
        ->where('tbl_suatchieu.suatchieu_date','=',$request->suatchieu_date)->get();
       
        $thoiluong1 = DB::table('tbl_phim')
        ->where('tbl_phim.phim_id',$request->cate_phim)
        ->first();
  
        $laythoigian=preg_replace('/[^0-9]/','',$thoiluong1->phim_thoiluong);
        $now=$request->suatchieu_time;
   
        $flag=0;
       
        if(count($thoiluong)>0)
        {
            foreach($thoiluong as $value)
            {   
                if($value->suatchieu_date) //==$request->suatchieu_date
                {
                    $mang[]=Carbon::parse($value->suatchieu_time)->format('H:i:s');
                   
                }
            }   
            //dd($thoiluong);
           
            foreach($mang as $value)   
            {   if($value < $now)
                {
                    if($value < Carbon::parse($now)->addMinutes(-($laythoigian+10))->format('H:i:s'))
                    {
                     $flag=$flag+1;
                    
                    }
                }
                else
                {
                    if($value > Carbon::parse($now)->addMinutes(($laythoigian+10))->format('H:i:s'))
                    {
                     $flag=$flag+1;
                    
                    }
                }
            }
           
            if($flag==count($thoiluong))
            {
                DB::table('tbl_suatchieu')->insert($data);
                Session::put('message','Thêm Suất chiếu thành công');
                return Redirect::to('add-suatchieu');
            }else
            {
                Session::put('message','Không thêm Suất chiếu thành công vì trùng thời gian chiếu');
                return Redirect::to('add-suatchieu');
            }
           
        }
        else
        {
            DB::table('tbl_suatchieu')->insert($data);
            Session::put('message','Thêm Suất chiếu thành công');
            return Redirect::to('add-suatchieu');
        }
   
       
  
      /*   if($request->suatchieu_time >= '17:00')
        {
            $data['suatchieu_gia'] = 10000; 
        }
        else{
            $data['suatchieu_gia'] = 0; 
        }
         */
      
    }
    public function edit_suatchieu($suatchieu_id){
        $this->AuthLogin();
        $edit_suatchieu =  DB::table('tbl_suatchieu')->where('suatchieu_id',$suatchieu_id)->get();
        $cate_dangphim = DB::table('tbl_dangphim')->orderby('dangphim_id','desc')->get();
        $cate_phong = DB::table('tbl_phong')->orderby('phong_id','desc')->get();
        $cate_phim = DB::table('tbl_phim')->orderby('phim_id','desc')->get();
      
        $manager_suatchieu = view('admin.edit_suatchieu')->with('edit_suatchieu',$edit_suatchieu)->with('cate_dangphim',$cate_dangphim)
        ->with('cate_phong',$cate_phong)->with('cate_phim',$cate_phim);
        return view('admin_layout')->with('admin.edit_suatchieu',$manager_suatchieu);
    }
    public function update_suatchieu(Request $request, $suatchieu_id){
        $this->AuthLogin();
        $data = array();
        $data['dangphim_id'] = $request->phim_dang; 
     
        $data['suatchieu_time'] = $request->suatchieu_time; 
        $data['phong_id'] = $request->cate_phong;
        $data['phim_id'] = $request->cate_phim;
        $data['suatchieu_date'] = $request->suatchieu_date; 
        $data['suatchieu_gia'] = $request->suatchieu_gia; 
        DB::table('tbl_suatchieu')->where('suatchieu_id',$suatchieu_id)->update($data);
        Session::put('message','Cập nhật suất chiếu thành công');
        return Redirect::to('all-suatchieu');
    }
    public function delete_suatchieu($suatchieu_id){
        $this->AuthLogin();
        DB::table('tbl_suatchieu')->where('suatchieu_id',$suatchieu_id)->delete();
        Session::put('message','Xóa suất chiếu thành công');
        return Redirect::to('all-suatchieu');
    }
    public function timsuatchieu(Request $request){
        $keywords_submit = $request ->keywords_submit;
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
    //      $search_phim =  DB::table('tbl_phim')
    //  ->join('tbl_suatchieu','tbl_suatchieu.phim_id','=','tbl_phim.phim_id')
    //  ->where('suatchieu_date','=',$request->ngaychieu)
    //  ->where('phim_status','0')->where('phim_oldnew','1')
    //  ->select('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
    //     'tbl_phim.phim_thoiluong')
    //     ->groupby('tbl_phim.phim_id','tbl_phim.phim_name','tbl_phim.phim_image',
    //     'tbl_phim.phim_thoiluong')
    //     ->orderby('tbl_phim.phim_id','desc')->limit(10)->get();
        // dd($keywords_submit);
        $timsuat = db::table('tbl_suatchieu')
        ->join('tbl_phim','tbl_phim.phim_id','=','tbl_suatchieu.phim_id')
        ->join('tbl_phong','tbl_phong.phong_id','=','tbl_suatchieu.phong_id')
        ->join('tbl_dangphim','tbl_dangphim.dangphim_id','=','tbl_suatchieu.dangphim_id')
        ->where('suatchieu_date','=',$request->keywords_submit)
        ->select('tbl_phong.phong_name','tbl_phim.phim_name','tbl_dangphim.dangphim_name','tbl_suatchieu.suatchieu_date',
        'tbl_suatchieu.suatchieu_time','tbl_suatchieu.suatchieu_gia')->get();
        // dd($timsuat);
      return view('admin.timsuatchieu')
      ->with('timsuat',$timsuat)
      ->with('keywords_submit',$keywords_submit)
      ->with('theloaiphim',$cate_phim);
    }
}
