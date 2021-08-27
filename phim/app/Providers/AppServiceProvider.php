<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use DB;
use Carbon\Carbon;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('welcome',function($view){
            $cate_phim = DB::table('tbl_theloaiphim')->where('theloaiphim_status','0')->orderby('theloaiphim_id','desc')->get(); //the loai
            $cate_dangphim = DB::table('tbl_dangphim')->where('dangphim_status','0')->orderby('dangphim_id','desc')->get();
    

          
       // view('pages.home')->with('theloaiphim',$cate_phim)->with('dangphim',$cate_dangphim)->with('all_phim',$all_phim);
            $view->with('theloaiphim',$cate_phim);//ten tham số truyền qua, giá trị cần truyền đi
            $view->with('dangphim',$cate_dangphim);
           
        });

        $mang =DB::table('tbl_ve')->get();
        $test = (Carbon::now('Asia/Ho_Chi_Minh')->addHour(-1)->format('Y-m-d H:i:s'));
        // $test1 = (Carbon::now('Asia/Ho_Chi_Minh')->addHour(-1)->format('Y-m-d H:i:s'));
        foreach ($mang as $value)
        {     
            if($value->ve_gio <= $test && $value->chontt != 1)
            {
                
                DB::table('tbl_ve')->where('ve_gio','=', $value->ve_gio)->delete();
            }
        }
          
    }
}
