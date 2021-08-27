@extends('admin_layout')
@section('admin_content')
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới Phòng
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
                                <form role="form" action="{{URL::to('/save-phong')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Phòng</label>
                                    <input type="text" name="phong_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                    <span class="error-message" style="color:red">{{ $errors->first('phong_name') }}</span>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Rạp</label>
                                    <select name="cate_rap" class="form-control input-lg m-bot15" id="rap_cate">
                                        @foreach($cate_rap as $key => $rap)
                                        <option value="{{($rap->rap_id)}}">{{($rap->rap_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Cột Ghế</label>
                                    <input type="text" name="cot" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                    <span class="error-message" style="color:red">{{ $errors->first('cot') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số Hàng Ghế</label>
                                    <input type="text" name="hang" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                    <span class="error-message" style="color:red">{{ $errors->first('hang') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Phòng</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="phong_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                    <span class="error-message" style="color:red">{{ $errors->first('phong_desc') }}</span>
                                </div>
                                
                                <button type="submit" name="add_phong" class="btn btn-info">Thêm Phòng</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
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

 
