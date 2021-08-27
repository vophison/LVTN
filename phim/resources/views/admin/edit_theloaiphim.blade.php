@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật thể loại
                        </header>
                       
                        
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                            @foreach($edit_theloaiphim as $key =>$edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-theloaiphim/'.$edit_value->theloaiphim_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thể loại</label>
                                    <input type="text" value="{{$edit_value->theloaiphim_name}}" name="theloaiphim_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung thể loại</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="theloaiphim_desc" id="ckeditor6">{{$edit_value->theloaiphim_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_theloaiphim" class="btn btn-info">Cập nhật thể loại</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection