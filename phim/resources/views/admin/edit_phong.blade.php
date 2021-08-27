@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Phòng
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            
                            <div class="position-center">
                            @foreach($edit_phong as $key =>$edit_value)
                                <form role="form" action="{{URL::to('/update-phong/'.$edit_value->phong_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Phòng</label>
                                    <input type="text" value="{{$edit_value->phong_name}}" name="phong_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Rạp</label>
                                    <select name="cate_rap" class="form-control input-lg m-bot15" id="cate">
                                        @foreach($cate_rap as $key => $rap)
                                        <option value="{{($rap->rap_id)}}">{{($rap->rap_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Cột Ghế</label>
                                    <input type="text" value="{{$edit_value->cot}}" name="cot" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Hàng Ghế</label>
                                    <input type="text" value="{{$edit_value->hang}}" name="hang" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung Phòng</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="phong_desc" id="exampleInputPassword1">{{$edit_value->phong_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_phong" class="btn btn-info">Cập nhật Phòng</button>
                            </form>
                            @endforeach
                            </div>
                            
                        </div>
                    </section>

            </div>
            <script type="text/javascript">
    $('#phim_dang').change(function(){
       var dangphim_id = $(this).val();
        var _token = $('input[name="_token"]').val();
         $.ajax({
                url:"{{url('/chon-suatchieu')}}",
                method:"POST",

                data:{_token:_token,dangphim_id:dangphim_id},

                success:function(data)
                    {
                        $('#suatchieu').html(data);
                        $('#phim_suatchieu').remove();
                    }
            });
    })
</script>
@endsection