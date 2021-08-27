@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Thành Phố
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            @foreach($edit_thanhpho as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-thanhpho/'.$edit_value->thanhpho_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Thành Phố</label>
                                    <input type="text" value="{{$edit_value->thanhpho_name}}" name="thanhpho_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phòng">
                                </div>
                                
                                <button type="submit" name="update_thanhpho" class="btn btn-info">Cập nhật Thành Phố</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection