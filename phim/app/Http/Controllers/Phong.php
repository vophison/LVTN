<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
Session_start();
class Phong extends Controller
{
    public function AuthLogin(){
        $admin_id= Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        } else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_phong(){
        $this->AuthLogin();  
        $cate_rap = DB::table('tbl_rap')->orderby('rap_id','desc')->get();
        return view('admin.add_phong')->with('cate_rap',$cate_rap);
    }
    

        
   /*  public function chon_suatchieu(Request $request){
        $this->AuthLogin();
        $data = $request->all();
        $output = '';
        $suatchieu = DB::table('tbl_suatchieu')->where('dangphim_id',$data['dangphim_id'])->get();
        $output.='<select name="phim_suatchieu" class="form-control input-lg m-bot15">
                    <option>--Chọn suat chieu theo dang phim--</option>
        ';       
                                  
        foreach ($suatchieu as $key => $value) {
             $output.='<option value="'.$value->suatchieu_id.'">'.$value->suatchieu_time.'</option>';
        }
        $output.='</select>';
        echo $output;

    } */
          
  
    public function all_phong(){
        $this->AuthLogin();
        $all_phong =  DB::table('tbl_phong')
        ->join('tbl_rap','tbl_rap.rap_id','=','tbl_phong.rap_id')
        ->orderby('tbl_phong.phong_id','desc')->get();
        $manager_phong = view('admin.all_phong')->with('all_phong',$all_phong);
        return view('admin_layout')->with('admin.all_phong',$manager_phong);

    }
    public function save_phong(Request $request){
        $this->validate($request,
        [
            'phong_name'=>'required',
            'cot'=>'required',
            'hang'=>'required',
            'phong_desc'=>'required',
            
        ],
        [
            'phong_name.required'=>'Tên phòng không được để trống',
            'cot.required'=>'Số cột không được để trống',
            'hang.required'=>'Số hàng không được để trống',
            'phong_desc.required'=>'Nội dung không được để trống',
        ]);
        $this->AuthLogin();
        $data = array();
        $data['phong_name'] = $request->phong_name; 
        $data['rap_id'] = $request->cate_rap; 
        $data['phong_desc'] = $request->phong_desc; 
        $data['cot'] = $request->cot;
        $data['hang'] = $request->hang;
        DB::table('tbl_phong')->insert($data);
        Session::put('message','Thêm phòng thành công');
        return Redirect::to('add-phong');
    }
    public function edit_phong($phong_id){
        $this->AuthLogin();
        $edit_phong =  DB::table('tbl_phong')->where('phong_id',$phong_id)->get();
        $cate_rap = DB::table('tbl_rap')->orderby('rap_id','desc')->get();
        $manager_phong = view('admin.edit_phong')->with('edit_phong',$edit_phong)->with('cate_rap',$cate_rap);
        return view('admin_layout')->with('admin.edit_phong',$manager_phong);
    }
    public function update_phong(Request $request, $phong_id){
        $this->AuthLogin();
        $data = array();
        $data['phong_name'] = $request->phong_name; 
        $data['rap_id'] = $request->cate_rap; 
        $data['phong_desc'] = $request->phong_desc;
        $data['cot'] = $request->cot;
        $data['hang'] = $request->hang; 
        DB::table('tbl_phong')->where('phong_id',$phong_id)->update($data);
        Session::put('message','Cập nhật Phòng thành công');
        return Redirect::to('all-phong');
    }
    public function delete_phong($phong_id){
        $this->AuthLogin();
        DB::table('tbl_phong')->where('phong_id',$phong_id)->delete();
        Session::put('message','Xóa Phòng thành công');
        return Redirect::to('all-phong');
    }
}
