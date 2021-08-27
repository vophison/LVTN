<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class Phim extends Controller
{
    public function AuthLogin()
    {
        $admin_id= Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('dashboard');
        } else
        {
            return Redirect::to('admin')->send();
        }
    }
    
    public function add_phim(){
        $this->AuthLogin();
        
        $cate_phim = DB::table('tbl_theloaiphim')->orderby('theloaiphim_id','desc')->get(); //the loai
        return view('admin.add_phim')->with('cate_phim',$cate_phim);
    }
    public function all_phim(){
        $this->AuthLogin();
        $all_phim =  DB::table('tbl_phim')
        ->join('tbl_theloaiphim','tbl_theloaiphim.theloaiphim_id','=','tbl_phim.theloaiphim_id')
        ->orderby('tbl_phim.phim_id','desc')->get();
        $manager_phim = view('admin.all_phim')->with('all_phim',$all_phim); 
        return view('admin_layout')->with('admin.all_phim',$manager_phim);

    }
    public function save_phim(Request $request){
        $this->validate($request,
        [
            'phim_name'=>'required',
            'phim_noidung'=>'required',
            'phim_image'=>'required',
            'phim_quocgia'=>'required',
            'phim_daodien'=>'required',
            'phim_dienvien'=>'required',
            'phim_thoiluong'=>'required',
            'phim_rated'=>'required',
            'phim_trailer'=>'required',
            'ngaybatdau'=>'required',
            'ngayketthuc'=>'required',
            'phim_cate'=>'required',
            'phim_oldnew'=>'required',
            'phim_status'=>'required',
        ],
        [
            'phim_name.required'=>'Tên phim không được để trống',
            'phim_noidung.required'=>'Nội dung không được để trống',
            'phim_image.required'=>'Hình ảnh không được để trống',
            'phim_quocgia.required'=>'Quốc gia không được để trống',
            'phim_daodien.required'=>'Đạo diễn không được để trống',
            'phim_dienvien.required'=>'Diễn viên không được để trống',
            'phim_thoiluong.required'=>'Thời lượng không được để trống',
            'phim_rated.required'=>'không được để trống',
            'phim_trailer.required'=>'Trailerkhông được để trống',
            'ngaybatdau.required'=>'Ngày không được để trống',
            'ngayketthuc.required'=>'Ngày không được để trống',
            'phim_cate.required'=>'không được để trống',
            'phim_oldnew.required'=>'không được để trống',
            'phim_status.required'=>'không được để trống',
            
        ]);
        // dd($request->file('phim_image'));
        $this->AuthLogin();
        $data = array();
        $data['phim_name'] = $request->phim_name; 
        $data['phim_noidung'] = $request->phim_noidung; 
        $data['phim_quocgia'] = $request->phim_quocgia; 
        $data['phim_daodien'] = $request->phim_daodien;  
        $data['phim_dienvien'] = $request->phim_dienvien;  
        $data['phim_thoiluong'] = $request->phim_thoiluong;  
        $data['phim_rated'] = $request->phim_rated;  
        $data['phim_trailer'] = $request->phim_trailer; 
        $data['ngaybatdau'] = $request->ngaybatdau; 
        $data['ngayketthuc'] = $request->ngayketthuc; 
        $data['theloaiphim_id'] = $request->phim_cate; 
        $data['phim_status'] = $request->phim_status; 
        $data['phim_oldnew'] = $request->phim_oldnew; 
        
        // $date['phim_image']=null;

        $get_image = $request->file('phim_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(base_path().'/public/upload/phims',$new_image);
            $data['phim_image'] = $new_image;
            DB::table('tbl_phim')->insert($data);
            Session::put('message','Thêm Phim thành công');
            return Redirect::to('all-phim');
        }
        DB::table('tbl_phim')->insert($data);
        Session::put('message','Thêm Phim thành công');
        return Redirect::to('all-phim');
    }
    public function unactive_phim($phim_id){
        $this->AuthLogin();
        DB::table('tbl_phim')->where('phim_id',$phim_id)->update(['phim_status'=>1]);
        Session::put('message','Phim sắp chiếu');
        return Redirect::to('all-phim');
    }
    public function active_phim($phim_id){
        $this->AuthLogin();
        DB::table('tbl_phim')->where('phim_id',$phim_id)->update(['phim_status'=>0]);
        Session::put('message','phim đang chiếu');
        return Redirect::to('all-phim');
    }
    public function edit_phim($phim_id){
        $this->AuthLogin();
        $cate_phim = DB::table('tbl_theloaiphim')->orderby('theloaiphim_id','desc')->get();
        $edit_phim =  DB::table('tbl_phim')->where('phim_id',$phim_id)->get();
        $manager_phim = view('admin.edit_phim')->with('edit_phim',$edit_phim)->with('cate_phim',$cate_phim);
        return view('admin_layout')->with('admin.edit_phim',$manager_phim);
    }
    public function update_phim(Request $request, $phim_id){
        $this->AuthLogin();
        $data = array();
        $data['phim_name'] = $request->phim_name; 
        $data['phim_noidung'] = $request->phim_noidung; 
        $data['phim_quocgia'] = $request->phim_quocgia; 
        $data['phim_daodien'] = $request->phim_daodien;  
        $data['phim_dienvien'] = $request->phim_dienvien;  
        $data['phim_thoiluong'] = $request->phim_thoiluong;  
        $data['phim_rated'] = $request->phim_rated;  
        $data['phim_trailer'] = $request->phim_trailer; 
        $data['ngaybatdau'] = $request->ngaybatdau; 
        $data['ngayketthuc'] = $request->ngayketthuc; 
        $data['theloaiphim_id'] = $request->phim_cate; 
        $data['phim_status'] = $request->phim_status; 
        $data['phim_oldnew'] = $request->phim_oldnew; 
        $get_image = $request->file('$phim_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move(base_path().'/public/upload/phims',$new_image);
            $data['phim_image'] = $new_image;
            DB::table('tbl_phim')->where('phim_id',$phim_id)->update($data);
            Session::put('message','Cập nhật Phim thành công');
            return Redirect::to('all-phim');
        }
        DB::table('tbl_phim')->where('phim_id',$phim_id)->update($data);
        Session::put('message','Cập nhật Phim thành công');
        return Redirect::to('all-phim');
    }
    public function delete_phim($phim_id){
        $this->AuthLogin();
        DB::table('tbl_phim')->where('phim_id',$phim_id)->delete();
        Session::put('message','Xóa Phim thành công');
        return Redirect::to('all-phim');
    }
    //end admin

    //
    public function details_phim($phim_id){
    
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
        $details_phim =  DB::table('tbl_phim') // lay ra phim thuoc the loai va dang phim nao
        ->join('tbl_theloaiphim','tbl_theloaiphim.theloaiphim_id','=','tbl_phim.theloaiphim_id')
        ->where('tbl_phim.phim_id',$phim_id)->get();
        foreach($details_phim as $key => $value){
            $theloaiphim_id = $value ->theloaiphim_id;
        }
     
        $related_phim =  DB::table('tbl_phim') // cac phim cung the loai lien quan
        ->join('tbl_theloaiphim','tbl_theloaiphim.theloaiphim_id','=','tbl_phim.theloaiphim_id')
        ->where('tbl_theloaiphim.theloaiphim_id',$theloaiphim_id)->whereNotIn('tbl_phim.phim_id',[$phim_id])->get();   //wherenotin tru ra phim minh da co o tren

        return view('pages.phim.show_details')->with('theloaiphim',$cate_phim)
        ->with('phim_details',$details_phim)->with('phim_related',$related_phim);
    }
    public function timkiem_phim(Request $request)
    {   
        $this->AuthLogin();
        $keywords = $request -> keywords_submit;
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
        $tim =  DB::table('tbl_phim')
        ->join('tbl_theloaiphim','tbl_theloaiphim.theloaiphim_id','=','tbl_phim.theloaiphim_id')
        ->where('phim_name','like','%'.$keywords.'%')
        ->get();
        // dd($tim);
        return view('admin.timphim')
        ->with('cate_phim',$cate_phim)
        ->with('tim',$tim);
    } 
}
