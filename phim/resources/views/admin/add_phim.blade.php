@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm mới Phim
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
                                <form role="form" action="{{URL::to('/save-phim')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Phim</label>
                                    <input type="text" name="phim_name" class="form-control" id="exampleInputEmail1" placeholder="Tên phim">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_name') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung phim</label>
                                    <textarea style="resize:none" rows="8" class="form-control" name="phim_noidung" id="ckeditor1" placeholder="Nội dung phim"></textarea>
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_noidung') }}</span>  
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <img src="" alt="" height="100" width="100" id="image">
                                    <input type="file" name="phim_image" class="form-control" id="exampleInputEmail1" onchange="chooseFile(this)"
                                    accept="image/gif,image/jpg,image/png,image/jpeg">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_image') }}</span>   
                                    
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Quốc Gia</label>
                                    <input type="text" name="phim_quocgia" class="form-control" id="exampleInputEmail1" placeholder="quốc gia">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_quocgia') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Đạo diễn</label>
                                    <input type="text" name="phim_daodien" class="form-control" id="exampleInputEmail1" placeholder="đạo diễn">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_daodien') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Diễn Viên</label>
                                    <input type="text" name="phim_dienvien" class="form-control" id="exampleInputEmail1" placeholder="diễn viên">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_dienvien') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời lượng</label>
                                    <input type="text" name="phim_thoiluong" class="form-control" id="exampleInputEmail1" placeholder="thời lượng">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_thoiluong') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Rated (giới hạn)</label>
                                    <input type="text" name="phim_rated" class="form-control" id="exampleInputEmail1" placeholder="rated">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_rated') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Trailer</label>
                                    <input type="text" name="phim_trailer" class="form-control" id="exampleInputEmail1" placeholder="trailer phim">
                                    <span class="error-message" style="color:red">{{ $errors->first('phim_trailer') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input id="date" name="ngaybatdau"   onchange="TDate()" min="<?php echo date('Y-m-d') ?>"  type="date"  class="form-control input-lg m-bot15" value="">
                                    <span class="error-message" style="color:red">{{ $errors->first('ngaybatdau') }}</span>   
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input id="ketthuc" name="ngayketthuc"   onchange="myFunction()" min="<?php echo date('Y-m-d') ?>"  type="date"  class="form-control input-lg m-bot15" value="">
                                    <span class="error-message" style="color:red">{{ $errors->first('ngayketthuc') }}</span>   
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Thể loại</label>
                                    <select name="phim_cate" class="form-control input-lg m-bot15">
                                        @foreach($cate_phim as $key => $cate)
                                        <option value="{{($cate->theloaiphim_id)}}">{{($cate->theloaiphim_name)}}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Hiển thị</label>
                                    <select name="phim_oldnew" class="form-control input-lg m-bot15">
                                        <option value="0">Phim Sắp Chiếu</option>
                                        <option value="1">Phim Đang Chiếu</option>
                                    </select>
                                   
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1">Unlock</label>
                                    <select name="phim_status" class="form-control input-lg m-bot15">
                                        <option value="0">Mở Phim</option>
                                        <option value="1">Khóa phim</option>
                                    </select>
                                   
                                </div>
                                
                                <button type="submit" name="add_phim" class="btn btn-info">Thêm Phim</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
            <script type="text/javascript"> 
            function TDate() {
    var UserDate = document.getElementById("date").value;
    var ToDate = new Date();

    if (new Date(UserDate).getDate() < ToDate.getDate()) {
          alert('Ngày chiếu không thể nhỏ hơn ngày hiện tại');
          document.getElementById("date").value=ToDate.getDate();
          return false;
     }
   
    return true;
}
    </script>
    <script type="text/javascript"> 

        function myFunction() {
        var x = document.getElementById("myDate").value;
        var y = document.getElementById("ketthuc").value;
        if(x > y)
            {
                alert('ngày kết thúc không thể nhỏ hơn ngày bắt đầu');
                document.getElementById("ketthuc").valueAsDate = null;
                return false;
            } 
            return true;
        }
        
    </script>
    <script type="text/javascript"> 

        function chooseFile(fileInput) {
            if(fileInput.files && fileInput.files[0]){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#image').attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        
        }
        
    </script>

@endsection