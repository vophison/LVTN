@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới dạng phim
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
                                <form role="form" action="{{URL::to('/save-dangphim')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên dạng phim</label>
                                    <input type="text" name="dangphim_name" class="form-control" id="exampleInputEmail1" placeholder="Tên dang">
                                    <span class="error-message" style="color:red">{{ $errors->first('dangphim_name') }}</span> 
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả dạng</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="dangphim_desc" id="ckeditor3" placeholder="Mô tả dạng"></textarea>
                                    <span class="error-message" style="color:red">{{ $errors->first('dangphim_desc') }}</span> 
                                </div>
                                
                                <button type="submit" name="add_dangphim" class="btn btn-info">Thêm Dạng Phim</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection