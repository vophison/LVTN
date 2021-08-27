@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li class="active">Hoàn thành đặt vé</li>
				</ol>
			</div>
			<h3> Bạn đã hoàn thành đặt vé</h3> </br>
			 <h4>Quý khách vui lòng đến quầy thanh toán trực tiếp trong vòng 1 giờ tới. Nếu không vé sẽ bị hủy</h4>

			
        </div>
</section> 
@endsection
