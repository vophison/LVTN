@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Tin Tức Khuyến Mãi 
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
                                <form role="form" action="{{URL::to('/save-tintuc')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tiêu đề Tin Tức</label>
                                    <input type="text" name="tintuc_tieude" class="form-control" id="exampleInputEmail1" placeholder="Tên tin">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="tintuc_image" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung Tin</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="tintuc_noidung" id="exampleInputPassword1" placeholder="Mô tả tin"></textarea>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="tintuc_status" class="form-control input-lg m-bot15">
                                        <option value="0">có</option>
                                        <option value="1">không</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_tintuc" class="btn btn-info">Thêm Tin</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection