@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Rạp
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
                                <form role="form" action="{{URL::to('/save-rap')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Rạp</label>
                                    <input type="text" name="rap_name" class="form-control" id="exampleInputEmail1" placeholder="Tên rạp">
                                    <span class="error-message" style="color:red">{{ $errors->first('rap_name') }}</span>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Thành Phố</label>
                                    <select name="rap_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_rap as $key => $cate)
                                        <option value="{{($cate->thanhpho_id)}}">{{($cate->thanhpho_name)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa Chỉ Rạp</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="rap_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                    <span class="error-message" style="color:red">{{ $errors->first('rap_desc') }}</span>
                                </div>
                                
                                <button type="submit" name="add_rap" class="btn btn-info">Thêm Rạp</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection