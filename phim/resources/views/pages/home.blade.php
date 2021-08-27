@extends('welcome')
@section('content')
	<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Danh sách phim</h2>
						
						@foreach($all_phim as $key =>  $phim)
						
						<div class="row">
						<div class="col-sm-4">
						<a href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('upload/phims/'.$phim->phim_image)}}" width="280" height="480"/>
											<h2>{{$phim->phim_name}}</h2>
											<p><b>Đạo Diễn: </b>{{$phim->phim_daodien}}</p>
											<p><b>Thời Lượng:</b> {{$phim->phim_thoiluong}}</p>
											<a href="#" align="left" class="btn btn-default add-to-cart"><i class="fa fa-heart"></i>Yêu Thích</a>
											<a align="right" href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Vé</a>
										</div>
								</div>
							</div>
							</a>
						</div>
						
						@endforeach	
						</div>	
	</div><!--features_items-->
					
@endsection 