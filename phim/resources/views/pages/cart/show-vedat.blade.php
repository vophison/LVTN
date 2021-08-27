@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li class="active">Xem lại thông tin vé đã đặt</li>
				</ol>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
							@if(session('thongbao'))
							<div class="alert alert-success">
							{{session('thongbao')}}
							</div>
							@endif
							@if(session('thongbaoloi'))
							<div class="alert alert-danger">
							{{session('thongbaoloi')}}
							</div>
							@endif
						<div class="bill-to">
							<h3>Thông tin vé đã đặt</h3> 
							<div class="form-one">
							<table class="table table-striped b-t b-light">
								<thead>
								<tr>
										<th>Tên khách hàng</th>
										<th>Mã vé</th>
										<th>Tên phim</th>
										<th>Tên rạp</th>
										<th>Ngày chiếu</th>
										<th>Giờ chiếu</th>
										<th>Phòng</th>
										<th>Chỗ ngồi</th>
										<th>Giá</th>
										<th>Trạng thái</th>
										<th style="width:30px;"></th>
								</tr>
								</thead>
								<tbody>
						@foreach($all_ve as $key => $ve)
						<tr>
							<td>{{$ve->customer_name}}</td>
							<td>{{$ve->ve_id}}</td>
							<td>{{$ve->phim_name}}</td>
							<td>{{$ve->rap_name}}</td>
							<td>{{$ve->suatchieu_date}}</td>
							<td>{{$ve->suatchieu_time}}</td>
							<td>{{$ve->phong_name}}</td>
							<td>A{{$ve->chongoi}}</td>
							<td>{{$ve->ve_gia}}</td>
								<td>
								@if($ve->chontt==1)
								{{'Đã thanh toán'}}
									
								@else
								{{'Đang đặt chỗ'}}
								@endif
								</td>
							
						</tr>
						@endforeach
						</tbody>
							</table>
							<!-- <table class="table table-striped b-t b-light">
						<thead>
						<tr>
							<th>Tên khách hàng</th>
							<th>Tên phim</th>
							<th>Tên rạp</th>
							<th>Ngày chiếu</th>
							<th>Giờ chiếu</th>
							<th>Phòng</th>
							<th>Chỗ ngồi</th>
							<th>Số Tiền</th>
							<th>Hủy vé</th>
						</tr>
						</thead>
						
						<tbody>
						@foreach($all_ve as $key => $ve)
						<tr>
							<td>{{$ve->customer_name}}</td>
							<td>{{$ve->phim_name}}</td>
							<td>{{$ve->rap_name}}</td>
							<td>{{$ve->suatchieu_date}}</td>
							<td>{{$ve->suatchieu_time}}</td>
							<td>{{$ve->phong_name}}</td>
							<td>A{{$ve->chongoi}}</td>
							<td>{{$ve->ve_gia}}</td>
							<td><a onclick="return confirm('Bạn chắc chắn muốn hủy vé không?')" href="{{URL::to('/delete-vedat/'.$ve->ve_id)}}" class="active styling-edit" ui-toggle-class="">
							<i class="fa fa-times text-danger text"></i></a></td>
						</tr>
						@endforeach
						</tbody>
      						</table> -->
							</div>
						</div>
					</div>	
				</div>
			</div>
		</div>
	</section> 

@endsection