@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Tin Khuyến Mãi
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            @foreach($edit_tintuc as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-tintuc/'.$edit_value->tintuc_id)}}" method="post"enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề</label>
                                    <input type="text" value="{{$edit_value->tintuc_tieude}}" name="tintuc_tieude" class="form-control" id="exampleInputEmail1" placeholder="Tên tiêu đề">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="tintuc_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/upload/tintucs/'.$edit_value->tintuc_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung Tin</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="tintuc_noidung" id="exampleInputPassword1">{{$edit_value->tintuc_noidung}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_tintuc" class="btn btn-info">Cập nhật</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection