@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thành phố
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
                                <form role="form" action="{{URL::to('/save-thanhpho')}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thành phố</label>
                                    <input type="text" name="thanhpho_name" class="form-control" id="exampleInputEmail1" placeholder="Tên thành phố">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="thanhpho_status" class="form-control input-lg m-bot15">
                                        <option value="0">có</option>
                                        <option value="1">không</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_thanhpho" class="btn btn-info">Thêm thành phố</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection