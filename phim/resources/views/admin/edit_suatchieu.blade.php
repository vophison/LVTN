@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Suất Chiếu
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            @foreach($edit_suatchieu as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-suatchieu/'.$edit_value->suatchieu_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                <label for="exampleInputEmail1">Phòng</label>
                                    <select name="cate_phong" class="form-control input-lg m-bot15">
                                        @foreach($cate_phong as $key => $phong)
                                            @if($phong->phong_id==$edit_value->phong_id)
                                                <option selected value="{{($phong->phong_id)}}">{{($phong->phong_name)}}</option>
                                            @else 
                                                 <option value="{{($phong->phong_id)}}">{{($phong->phong_name)}}</option>   
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Phim</label>
                                    <select name="cate_phim" class="form-control input-lg m-bot15">
                                        @foreach($cate_phim as $key => $phim)
                                            @if($phim->phim_id==$edit_value->phim_id)
                                                <option selected value="{{($phim->phim_id)}}">{{($phim->phim_name)}}</option>
                                            @else 
                                                 <option value="{{($phim->phim_id)}}">{{($phim->phim_name)}}</option>   
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Dạng Phim</label>
                                    <select name="phim_dang" class="form-control input-lg m-bot15">
                                        @foreach($cate_dangphim as $key => $catedang)
                                            @if($catedang->dangphim_id==$edit_value->dangphim_id)
                                                <option selected value="{{($catedang->dangphim_id)}}">{{($catedang->dangphim_name)}}</option>
                                            @else 
                                                 <option value="{{($catedang->dangphim_id)}}">{{($catedang->dangphim_name)}}</option>   
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Ngày Chiếu</label>
                                <input id="date" value="{{$edit_value->suatchieu_date}}"  onchange="TDate()"  type="date"  class="form-control input-lg m-bot15" name="suatchieu_date" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giờ Chiếu</label>
                                    <input type="time" value="{{$edit_value->suatchieu_time}}" name="suatchieu_time" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá Suất Chiếu</label>
                                    <input type="text" value="{{$edit_value->suatchieu_gia}}" name="suatchieu_gia" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <button type="submit" name="update_suatchieu" class="btn btn-info">Cập nhật Suất Chiếu</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
            <script type="text/javascript"> 
            function TDate() {
    var UserDate = document.getElementById("date").value;
    var ToDate = new Date();

    if (new Date(UserDate).getDate() < ToDate.getDate()) {
          alert('Ngày chiếu không thể nhỏ hơn ngày hiện tại');
          document.getElementById("date").value=ToDate.getDate();
          return false;
     }
   
    return true;
}
    </script>
@endsection