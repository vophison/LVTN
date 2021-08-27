@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm suất chiếu
                        </header>
                       
                        <div class="panel-body">
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/save-suatchieu')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                <label for="exampleInputEmail1">Phòng</label>
                                    <select name="cate_phong" class="form-control input-lg m-bot15">
                                        @foreach($cate_phong as $key => $phong)
                                        <option value="{{($phong->phong_id)}}">{{($phong->phong_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail1">Phim</label>
                                    <select name="cate_phim" class="form-control input-lg m-bot15">
                                        @foreach($cate_phim as $key => $phim)
                                        <option value="{{($phim->phim_id)}}">{{($phim->phim_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                <label for="exampleInputEmail1">Dạng Phim</label>
                                    <select name="phim_dang" class="form-control input-lg m-bot15">
                                        @foreach($cate_dangphim as $key => $dang)
                                        <option value="{{($dang->dangphim_id)}}">{{($dang->dangphim_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                     <label for="exampleInputEmail1">Ngày Chiếu</label>
                                     <input id="date"   onchange="TDate()" min="<?php echo date('Y-m-d') ?>"  type="date"  class="form-control input-lg m-bot15" name="suatchieu_date" value="">
                                     <span class="error-message" style="color:red">{{ $errors->first('suatchieu_date') }}</span>   		
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giờ chiếu</label>
                                    <input type="time" name="suatchieu_time" class="form-control" id="exampleInputEmail1" placeholder="">
                                    <span class="error-message" style="color:red">{{ $errors->first('suatchieu_time') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Suất Chiếu</label>
                                    <input type="number" name="suatchieu_gia" class="form-control" id="exampleInputEmail1" placeholder="">
                                    <span class="error-message" style="color:red">{{ $errors->first('suatchieu_gia') }}</span>   
                                </div>
                             
                                
                                <button type="submit" name="add_suatchieu" class="btn btn-info">Thêm suất chiếu</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
    <script type="text/javascript"> 
            function TDate() {
    var UserDate = document.getElementById("date").value;
    var ToDate = new Date();

    if (new Date(UserDate).getDate() < ToDate.getDate()) {
          alert('Ngày không thể nhỏ hơn ngày hiện tại');
          document.getElementById("date").value=ToDate.getDate();
          return false;
     }
   
    return true;
}
    </script>
@endsection