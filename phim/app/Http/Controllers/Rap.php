<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class Rap extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_rap(){
        $this->AuthLogin();   //goi ham o tren
         $cate_rap = DB::table('tbl_thanhpho')->orderby('thanhpho_id','desc')->get(); //thanhpho
        return view('admin.add_rap')->with('cate_rap',$cate_rap);
    }
    public function all_rap(){
        $this->AuthLogin();
        $all_rap =  DB::table('tbl_rap')
        ->join('tbl_thanhpho','tbl_thanhpho.thanhpho_id','=','tbl_rap.thanhpho_id')
        ->orderby('tbl_rap.rap_id','desc')->get();
        $manager_rap = view('admin.all_rap')->with('all_rap',$all_rap);
        return view('admin_layout')->with('admin.all_rap',$manager_rap);

    }
    public function save_rap(Request $request){
        $this->validate($request,
        [
            'rap_name'=>'required',
            'rap_desc'=>'required',

        ],
        [
            'rap_name.required'=>'Tên rạp không được để trống',
            'rap_desc.required'=>'Địa chỉ không được để trống',
        ]);
        $this->AuthLogin();
        $data = array();
        $data['rap_name'] = $request->rap_name; 
        $data['thanhpho_id'] = $request->rap_cate; 
        $data['rap_desc'] = $request->rap_desc;   
        DB::table('tbl_rap')->insert($data);
        Session::put('message','Thêm rạp thành công');
        return Redirect::to('add-rap');
    }
    public function edit_rap($rap_id){
        $this->AuthLogin();
        $cate_rap = DB::table('tbl_thanhpho')->orderby('thanhpho_id','desc')->get(); 
        $edit_rap =  DB::table('tbl_rap')->where('rap_id',$rap_id)->get();
        $manager_rap = view('admin.edit_rap')->with('edit_rap',$edit_rap)->with('cate_rap',$cate_rap);
        return view('admin_layout')->with('admin.edit_rap',$manager_rap);
    }
    public function update_rap(Request $request, $rap_id){
        $this->AuthLogin();
        $data = array();
        $data['rap_name'] = $request->rap_name; 
        $data['thanhpho_id'] = $request->rap_cate; 
        $data['rap_desc'] = $request->rap_desc; 
        DB::table('tbl_rap')->where('rap_id',$rap_id)->update($data);
        Session::put('message','Cập nhật rạp phim thành công');
        return Redirect::to('all-rap');
    }
    public function delete_rap($rap_id){
        $this->AuthLogin();
        DB::table('tbl_rap')->where('rap_id',$rap_id)->delete();
        Session::put('message','Xóa rạp thành công');
        return Redirect::to('all-rap');
    }
}
