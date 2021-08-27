@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật Phim
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
                                @foreach($edit_phim as $key => $phim_pro)

                                
                                <form role="form" action="{{URL::to('/update-phim/'.$phim_pro->phim_id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Phim</label>
                                    <input type="text" name="phim_name" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung phim</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="phim_noidung" id="ckeditor2" >{{$phim_pro->phim_noidung}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="phim_image" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('upload/phims/'.$phim_pro->phim_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quốc Gia</label>
                                    <input type="text" name="phim_quocgia" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_quocgia}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đạo diễn</label>
                                    <input type="text" name="phim_daodien" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_daodien}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Diễn viên</label>
                                    <input type="text" name="phim_dienvien" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_dienvien}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời lượng</label>
                                    <input type="text" name="phim_thoiluong" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_thoiluong}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rated (giới hạn độ tuổi...)</label>
                                    <input type="text" name="phim_rated" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_rated}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trailer</label>
                                    <input type="text" name="phim_trailer" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->phim_trailer}}">
                                </div> 
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="date" name="ngaybatdau" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->ngaybatdau}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="date" name="ngayketthuc" class="form-control" id="exampleInputEmail1" value="{{$phim_pro->ngayketthuc}}">
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                    <select name="phim_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_phim as $key => $cate)
                                            @if($cate->theloaiphim_id==$phim_pro->theloaiphim_id)
                                                <option selected value="{{($cate->theloaiphim_id)}}">{{($cate->theloaiphim_name)}}</option>
                                            @else 
                                                 <option value="{{($cate->theloaiphim_id)}}">{{($cate->theloaiphim_name)}}</option>   
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="phim_oldnew" class="form-control input-lg m-bot15">
                                        <option value="0">Phim Sắp Chiếu</option>
                                        <option value="1">Phim Đang chiếu Chiếu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Unlock</label>
                                    <select name="phim_status" class="form-control input-lg m-bot15">
                                        <option value="0">Mở Phim</option>
                                        <option value="1">Khóa Phim</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="add_phim" class="btn btn-info">Cập nhật Phim</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection