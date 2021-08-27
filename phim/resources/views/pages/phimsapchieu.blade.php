@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
						<h2 class="title text-center">Phim sắp chiếu</h2>
					
						@foreach($phimsapchieu as $key =>  $phim)
						<a href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('upload/phims/'.$phim->phim_image)}}" alt="" />
											<h2>{{$phim->phim_name}}</h2>
											<p><b>Đạo Diễn: </b>{{$phim->phim_daodien}}</p>
											<p><b>Thời Lượng:</b> {{$phim->phim_thoiluong}}</p>
											
											<a href="#" align="left" class="btn btn-default add-to-cart"><i class="fa fa-heart"></i>Yêu Thích</a>
											<a align="right" href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua Vé</a>
										</div>
								</div>
							</div>
						</div>
						</a>
						@endforeach		
					</div><!--features_items-->
					<div class="features_items"><!--features_items-->
					
					</div><!--features_items-->				

                    <div class="recommended_items"><!--recommended_items-->
				 	
						</div> <!-- </recommended_items-->
@endsection 