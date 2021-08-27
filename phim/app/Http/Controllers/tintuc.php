<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class tintuc extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_tintuc(){
        $this->AuthLogin();   //goi ham o tren
        return view('admin.add_tintuc');
    }
    public function all_tintuc(){
        $this->AuthLogin();
        $all_tintuc =  DB::table('tbl_tintuc')->get();
        $manager_tintuc = view('admin.all_tintuc')->with('all_tintuc',$all_tintuc);
        return view('admin_layout')->with('admin.all_tintuc',$manager_tintuc);

    }
    public function save_tintuc(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['tintuc_tieude'] = $request->tintuc_tieude; 
        $data['tintuc_noidung'] = $request->tintuc_noidung; 
        $data['tintuc_status'] = $request->tintuc_status; 
        $get_tintuc_image = $request->file('tintuc_image');
        if($get_tintuc_image){
            $get_name_image = $get_tintuc_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_tintuc_image->getClientOriginalExtension();
            $get_tintuc_image->move(base_path().'/public/upload/tintucs',$new_image);
            $data['tintuc_image'] = $new_image;
            DB::table('tbl_tintuc')->insert($data);
            Session::put('message','Thêm Tin thành công');
            return Redirect::to('all-tintuc');
        }

        DB::table('tbl_tintuc')->insert($data);
        Session::put('message','Thêm Tin thành công');
        return Redirect::to('add-tintuc');
    }
    public function unactive_tintuc($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_tintuc')->where('tintuc_id',$tintuc_id)->update(['tintuc_status'=>1]);
        Session::put('message','Không kích hoạt Tin');
        return Redirect::to('all-tintuc');
    }
    public function active_tintuc($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_tintuc')->where('tintuc_id',$tintuc_id)->update(['tintuc_status'=>0]);
        Session::put('message','Kích hoạt Tin thành công');
        return Redirect::to('all-tintuc');
    }
    public function edit_tintuc($tintuc_id){
        $this->AuthLogin();
        $edit_tintuc =  DB::table('tbl_tintuc')->where('tintuc_id',$tintuc_id)->get();
        $manager_tintuc = view('admin.edit_tintuc')->with('edit_tintuc',$edit_tintuc);
        return view('admin_layout')->with('admin.edit_tintuc',$manager_tintuc);
    }
    public function update_tintuc(Request $request, $tintuc_id){
        $this->AuthLogin();
        $data = array();
        $data['tintuc_tieude'] = $request->tintuc_tieude; 
        $data['tintuc_noidung'] = $request->tintuc_noidung; 
        $get_tintuc_image = $request->file('tintuc_image');
        if($get_tintuc_image){
            $get_name_image = $get_tintuc_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));   
            $new_image=$name_image.rand(0,99).'.'.$get_tintuc_image->getClientOriginalExtension();
            $get_tintuc_image->move(base_path().'/public/upload/tintucs',$new_image);
            $data['tintuc_image'] = $new_image;
            DB::table('tbl_tintuc')->insert($data);
            Session::put('message','Thêm Tin thành công');
            return Redirect::to('all-tintuc');
        }
        DB::table('tbl_tintuc')->where('tintuc_id',$tintuc_id)->update($data);
        Session::put('message','Cập nhật Tin thành công');
        return Redirect::to('all-tintuc');
    }
    public function delete_tintuc($tintuc_id){
        $this->AuthLogin();
        DB::table('tbl_tintuc')->where('tintuc_id',$tintuc_id)->delete();
        Session::put('message','Xóa Tin thành công');
        return Redirect::to('all-tintuc');
    }
}
