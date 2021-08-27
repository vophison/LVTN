@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới thể loại phim
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
                                <form role="form" action="{{URL::to('/save-theloaiphim')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thể loại</label>
                                    <input type="text" name="theloaiphim_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                    <span class="error-message" style="color:red">{{ $errors->first('theloaiphim_name') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung mô tả</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="theloaiphim_desc" id="ckeditor5" placeholder="Mô tả danh mục"></textarea>
                                    <span class="error-message" style="color:red">{{ $errors->first('theloaiphim_desc') }}</span>   
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="theloaiphim_status" class="form-control input-lg m-bot15">
                                        <option value="0">có</option>
                                        <option value="1">không</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_theloaiphim" class="btn btn-info">Thêm thể loại</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection