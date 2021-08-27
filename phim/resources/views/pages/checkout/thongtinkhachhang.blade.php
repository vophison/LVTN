@extends('welcome')
@section('content')
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/trangchu')}}">Home</a></li>
				  <li class="active">thông tin cá nhân</li>
				</ol>
			</div>

			<div class="container">
    <div id="content">
        
     
            <div class="row">
                
                <div class="col-sm-12">
                    <div class="your-order">
                        <div class="your-order-head"><h5>Thông tin cơ bản</h5></div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="space20">&nbsp;</div>
                            
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Họ Tên:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$khachhang->customer_name}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Email:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$khachhang->customer_email}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Số điện thoại:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$khachhang->customer_phone}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Mật khẩu:</p></div>
                                <div class="pull-right"><h5 class="color-black">{{$khachhang->customer_password}}</h5></div>
                                
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    

      
                    </div> <!-- .your-order -->
                </div>
            </div>
            <a class="btn btn-primary" href="{{URL::to('/suakhachhang/'.$khachhang->customer_id)}}">Sửa thông tin  <i class="fa fa-chevron-right"></i></a>
    </div> <!-- #content -->
</div>
		</div>
	</section> 

@endsection