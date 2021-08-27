@extends('welcome')
@section('content')
<div class="features_items"><!--features_items-->
						
						@foreach($theloaiphim_name as $key =>$name)
						
						<h2 class="title text-center">{{$name->theloaiphim_name}}</h2>
						@endforeach
						@foreach($theloaiphim_by_id as $key =>  $phim)
						<a href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}">
						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('upload/phims/'.$phim->phim_image)}}" alt="" />
											<h2>{{$phim->phim_name}}</h2>
											<span><h3>{{($phim->phim_gia).' '.'VNĐ'}}</h3></span>
											<a align="left" href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua vé</a>
											<a align="right" href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Xem chi tiết</a>
										</div>
								</div>		
							</div>
						</div>
						</a>
						@endforeach		 
					</div><features_items-->

					<!--/recommended_items-->
@endsection 