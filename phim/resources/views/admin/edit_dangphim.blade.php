@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật dạng phim
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            @foreach($edit_dangphim as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-dangphim/'.$edit_value->dangphim_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Dạng</label>
                                    <input type="text" value="{{$edit_value->dangphim_name}}" name="dangphim_name" class="form-control" id="exampleInputEmail1" placeholder="Tên dang">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung Dạng Phim</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="dangphim_desc" id="ckeditor4">{{$edit_value->dangphim_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_dangphim" class="btn btn-info">Cập nhật dạng phim</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection