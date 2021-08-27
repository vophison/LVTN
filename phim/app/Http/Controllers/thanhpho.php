<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class thanhpho extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_thanhpho(){
        $this->AuthLogin();   //goi ham o tren
        return view('admin.add_thanhpho');
    }
    public function all_thanhpho(){
        $this->AuthLogin();
        $all_thanhpho =  DB::table('tbl_thanhpho')->get();
        $manager_thanhpho = view('admin.all_thanhpho')->with('all_thanhpho',$all_thanhpho);
        return view('admin_layout')->with('admin.all_thanhpho',$manager_thanhpho);

    }
    public function save_thanhpho(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['thanhpho_name'] = $request->thanhpho_name; 
        $data['thanhpho_status'] = $request->thanhpho_status; 

        DB::table('tbl_thanhpho')->insert($data);
        Session::put('message','Thêm thành phố thành công');
        return Redirect::to('add-thanhpho');
    }
    public function unactive_thanhpho($thanhpho_id){
        $this->AuthLogin();
        DB::table('tbl_thanhpho')->where('thanhpho_id',$thanhpho_id)->update(['thanhpho_status'=>1]);
        Session::put('message','Không kích hoạt thành phố');
        return Redirect::to('all-thanhpho');
    }
    public function active_thanhpho($thanhpho_id){
        $this->AuthLogin();
        DB::table('tbl_thanhpho')->where('thanhpho_id',$thanhpho_id)->update(['thanhpho_status'=>0]);
        Session::put('message','Kích hoạt thành phố thành công');
        return Redirect::to('all-thanhpho');
    }
    public function edit_thanhpho($thanhpho_id){
        $this->AuthLogin();
        $edit_thanhpho =  DB::table('tbl_thanhpho')->where('thanhpho_id',$thanhpho_id)->get();
        $manager_thanhpho = view('admin.edit_thanhpho')->with('edit_thanhpho',$edit_thanhpho);
        return view('admin_layout')->with('admin.edit_thanhpho',$manager_thanhpho);
    }
    public function update_thanhpho(Request $request, $thanhpho_id){
        $this->AuthLogin();
        $data = array();
        $data['thanhphoname'] = $request->thanhpho_name; 
        DB::table('tbl_thanhpho')->where('thanhpho_id',$thanhpho_id)->update($data);
        Session::put('message','Cập nhật thành phố thành công');
        return Redirect::to('all-thanhpho');
    }
    public function delete_thanhpho($thanhpho_id){
        $this->AuthLogin();
        DB::table('tbl_thanhpho')->where('thanhpho_id',$thanhpho_id)->delete();
        Session::put('message','Xóa thành phố thành công');
        return Redirect::to('all-thanhpho');
    }
}
