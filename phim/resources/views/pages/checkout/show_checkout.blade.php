@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li class="active">Check out</li>
				</ol>
			</div>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12">
						<div class="bill-to">
							<h3>Thông tin vé đã đặt</h3> 
							<div class="form-one">
						
								<form>
									<p>Phim</p><input type="text" value="{{$tenphim->phim_name}}">	
									<p>Rạp</p><input type="text" value="{{$tenphim->rap_name}}">	
									<p>Ngày Chiếu</p><input type="text" value="{{$tenphim->suatchieu_date}}">
									<p>Suất Chiếu</p><input type="text" value="{{$tenphim->suatchieu_time}}"> 
									<p>Phòng</p><input type="text" value="{{$tenphim->phong_name}}">
									<!-- <p>Gia</p><input type="text" value="{{$tenphim->suatchieu_gia}}"> -->
									<p>Ghế số</p>
									<table class="table table-bordered" >
									@foreach($test as $value)
									<td style="text-align: center; background-color:green;" >{{$value}}</td>
 									 @endforeach
		  </table>
								</form>
								
							</div>
						</div>
					</div>	
				</div>
			</div>
			 <h4 style="margin:40px 0; font-size:20px;">Chọn hình thức thanh toán</h4>
			
			<form action="{{URL::to('/hoanthanh-datve')}}" method="post">
			{{csrf_field()}}
			
  	<input type="hidden" name="phim_id" class="form-control" value="{{$tenphim->phim_id}}">
  	<input type="hidden" name="phong_rap" class="form-control" value="{{$tenphim->rap_id}}">
  	<input type="hidden" name="suatchieu_id"  class="form-control" value="{{$tenphim->suatchieu_id}}">
  	<input type="hidden" name="phong_kho"  class="form-control" value="{{$tenphim->phong_id}}">
	  
		@foreach($test as $value)
 			 <input type="hidden" name="chongoinguoixem[]"  class="form-control" value="{{$value}}">
 		 @endforeach
			<div class="payment-options">
					<!-- <span>
						<label><input name="" value="1" type="checkbox"> Direct Bank Transfer</label>
					</span>
					<span>
						<label><input  value="2" type="checkbox"> Thẻ ATM</label>
					</span> -->
					<span>
						<label><input value="1" name="chontt" type="checkbox"> Thanh toán online</label>
					</span>
					<span>
						<label><input value="2" name="chontt" type="checkbox"> Thanh toán tại quầy</label>
					</span>
				</div>
				<input type="submit" class="btn btn-success" value="Đặt Vé" name="hoanthanh-datve"> 
			</form>
		</div>
	</section> 

@endsection
<!-- <script>
	setTimeout(() => {
		location.reload();
	}, 5000;
	//5k la giay = 5s
</script> -->