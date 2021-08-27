@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê danh sách Phim
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
          
          <div class="col-sm-3">
          <form action="{{URL::to('/tim-admin')}}" method="post">
						{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="keywords_submit" placeholder="Nhập từ khóa"/>
							<input type="submit" name="search_items" class="btn-info" value="Tìm"/>
						</div>
						</form>
          </div>
          
    </div>
    <div class="table-responsive">
         <?php
	           $message = Session::get('message');
	            if($message){
	            echo '<span class="text-alert">',$message,'</span>';
	            	Session::put('message',null);
	                     }
	       ?>	
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên Phim</th>
            <th>Hình</th>
            <th>Thể Loại</th>            
            <th>Thời lượng</th>
            <th>Ngày bắt đầu</th>
            <th>ngày kết thúc</th>
            <th>Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($tim as $key => $phim_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{$phim_pro->phim_name}}</td>
            <td><img src="upload/phims/{{$phim_pro->phim_image}}" height="100" width="100"></td>
            <td>{{$phim_pro->theloaiphim_name}}</td>
            <td>{{$phim_pro->phim_thoiluong}}</td>
            <td>{{$phim_pro->ngaybatdau}}</td>
            <td>{{$phim_pro->ngayketthuc}}</td>
            <td><span class="text-ellipsis">
            <?php
              if($phim_pro->phim_status==0){
                ?>
                <a href="{{URL::to('/unactive-phim/'.$phim_pro->phim_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>;
                <?php
                }else {
                ?>
               <a href="{{URL::to('/active-phim/'.$phim_pro->phim_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>;
               <?php
              }
              ?>
            </span></td>
            <td>
              <a href="{{URL::to('/edit-phim/'.$phim_pro->phim_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa Phim không?')" href="{{URL::to('/delete-phim/'.$phim_pro->phim_id)}}" class="active styling-edit" ui-toggle-class="">
              <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
         @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection