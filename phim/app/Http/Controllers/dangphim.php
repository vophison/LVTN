<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class dangphim extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_dangphim(){
        $this->AuthLogin();
       
        return view('admin.add_dangphim');
    }
    public function all_dangphim(){
        $this->AuthLogin();
        $all_dangphim =  DB::table('tbl_dangphim')->get();
        $manager_dangphim= view('admin.all_dangphim')->with('all_dangphim',$all_dangphim);
        return view('admin_layout')->with('admin.all_dangphim',$manager_dangphim);

    }
    public function save_dangphim(Request $request){
        $this->validate($request,
        [
            'dangphim_name'=>'required',
            'dangphim_desc'=>'required',

        ],
        [
            'dangphim_name.required'=>'Tên dạng phim không được để trống',
            'dangphim_desc.required'=>'Mô tả không được để trống',
        ]);
        $this->AuthLogin();
        $data = array();
        $data['dangphim_name'] = $request->dangphim_name; 
        $data['dangphim_desc'] = $request->dangphim_desc; 

        DB::table('tbl_dangphim')->insert($data);
        Session::put('message','Thêm dạng phim thành công');
        return Redirect::to('add-dangphim');
    }
    public function edit_dangphim($dangphim_id){
        $this->AuthLogin();
        $edit_dangphim =  DB::table('tbl_dangphim')->where('dangphim_id',$dangphim_id)->get();
       
        $manager_dangphim = view('admin.edit_dangphim')->with('edit_dangphim',$edit_dangphim);
        return view('admin_layout')->with('admin.edit_dangphim',$manager_dangphim);
    }
    public function update_dangphim(Request $request, $dangphim_id){
        $this->AuthLogin();
        $data = array();
        $data['dangphim_name'] = $request->dangphim_name; 
        $data['dangphim_desc'] = $request->dangphim_desc; 
        DB::table('tbl_dangphim')->where('dangphim_id',$dangphim_id)->update($data);
        Session::put('message','Cập nhật dạng phim thành công');
        return Redirect::to('all-dangphim');
    }
    public function delete_dangphim($dangphim_id){
        $this->AuthLogin();
        DB::table('tbl_dangphim')->where('dangphim_id',$dangphim_id)->delete();
        Session::put('message','Xóa dạng phim thành công');
        return Redirect::to('all-dangphim');
    }
}
