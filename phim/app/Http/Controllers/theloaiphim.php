<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class theloaiphim extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_theloaiphim(){
        $this->AuthLogin();
        return view('admin.add_theloaiphim');
    }
    public function all_theloaiphim(){
        $this->AuthLogin();
        $all_theloaiphim =  DB::table('tbl_theloaiphim')->get();
        $manager_theloaiphim = view('admin.all_theloaiphim')->with('all_theloaiphim',$all_theloaiphim);
        return view('admin_layout')->with('admin.all_theloaiphim',$manager_theloaiphim);

    }
    public function save_theloaiphim(Request $request){
        $this->validate($request,
        [
            'theloaiphim_name'=>'required',
            'theloaiphim_desc'=>'required',

        ],
        [
            'theloaiphim_name.required'=>'Thể loại phim không được để trống',
            'theloaiphim_desc.required'=>'Mô tả không được để trống',
        ]);
        $this->AuthLogin();
        $data = array();
        $data['theloaiphim_name'] = $request->theloaiphim_name; 
        $data['theloaiphim_desc'] = $request->theloaiphim_desc; 
        $data['theloaiphim_status'] = $request->theloaiphim_status; 

        DB::table('tbl_theloaiphim')->insert($data);
        Session::put('message','Thêm thể loại thành công');
        return Redirect::to('add-theloaiphim');
    }
    public function unactive_theloaiphim($theloaiphim_id){
        $this->AuthLogin();
        DB::table('tbl_theloaiphim')->where('theloaiphim_id',$theloaiphim_id)->update(['theloaiphim_status'=>1]);
        Session::put('message','Không kích hoạt thể loại');
        return Redirect::to('all-theloaiphim');
    }
    public function active_theloaiphim($theloaiphim_id){
        $this->AuthLogin();
        DB::table('tbl_theloaiphim')->where('theloaiphim_id',$theloaiphim_id)->update(['theloaiphim_status'=>0]);
        Session::put('message','Kích hoạt thể loại thành công');
        return Redirect::to('all-theloaiphim');
    }
    public function edit_theloaiphim($theloaiphim_id){
        $this->AuthLogin();
        $edit_theloaiphim =  DB::table('tbl_theloaiphim')->where('theloaiphim_id',$theloaiphim_id)->get();
        $manager_theloaiphim = view('admin.edit_theloaiphim')->with('edit_theloaiphim',$edit_theloaiphim);
        return view('admin_layout')->with('admin.edit_theloaiphim',$manager_theloaiphim);
    }
    public function update_theloaiphim(Request $request, $theloaiphim_id){
        $this->AuthLogin();
        $data = array();
        $data['theloaiphim_name'] = $request->theloaiphim_name; 
        $data['theloaiphim_desc'] = $request->theloaiphim_desc; 
        DB::table('tbl_theloaiphim')->where('theloaiphim_id',$theloaiphim_id)->update($data);
        Session::put('message','Cập nhật thể loại thành công');
        return Redirect::to('all-theloaiphim');
    }
    public function delete_theloaiphim($theloaiphim_id){
        $this->AuthLogin();
        DB::table('tbl_theloaiphim')->where('theloaiphim_id',$theloaiphim_id)->delete();
        Session::put('message','Xóa thể loại thành công');
        return Redirect::to('all-theloaiphim');
    }
    //End -function Admin
    // theloai-home
    public function show_theloai_home($theloaiphim_id){
        $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get();
        $theloaiphim_by_id=DB::table('tbl_phim')->join('tbl_theloaiphim','tbl_phim.theloaiphim_id','=','tbl_theloaiphim.theloaiphim_id')
        ->where('tbl_phim.theloaiphim_id','=',$theloaiphim_id)->get();
        $theloaiphim_name = DB::table('tbl_theloaiphim')->where('tbl_theloaiphim.theloaiphim_id',$theloaiphim_id)->limit(1)->get();
        return view('pages.theloai.show_theloai')->with('theloaiphim',$cate_phim)
        ->with('theloaiphim_by_id',$theloaiphim_by_id)->with('theloaiphim_name',$theloaiphim_name);
 
    }
}
