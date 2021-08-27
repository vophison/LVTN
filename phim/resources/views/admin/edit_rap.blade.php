@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Rạp
                        </header>
                        <?php
	                        $message = Session::get('message');
	                        if($message){
	                    	echo '<span class="text-alert">',$message,'</span>';
	                    	Session::put('message',null);
	                        }
	                    ?>	
                        <div class="panel-body">
                           
                            <div class="position-center">
                            @foreach($edit_rap as $key =>$rap_pro)
                                <form role="form" action="{{URL::to('/update-rap/'.$rap_pro->rap_id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Rạp</label>
                                    <input type="text" value="{{$rap_pro->rap_name}}" name="rap_name" class="form-control" id="exampleInputEmail1" placeholder="Tên rạp">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Thành Phố</label>
                                    <select name="rap_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_rap as $key => $catee)
                                            @if($catee->thanhpho_id==$rap_pro->thanhpho_id)
                                                <option selected value="{{($catee->thanhpho_id)}}">{{($catee->thanhpho_name)}}</option>
                                            @else 
                                                 <option value="{{($catee->thanhpho_id)}}">{{($catee->thanhpho_name)}}</option>   
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Địa Chỉ Rạp</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="rap_desc" id="exampleInputPassword1">{{$rap_pro->rap_desc}}</textarea>
                                </div>
                                
                                <button type="submit" name="update_rap" class="btn btn-info">Cập nhật rạp</button>
                            </form>
                            @endforeach
                            </div>
                           
                        </div>
                    </section>

            </div>
@endsection