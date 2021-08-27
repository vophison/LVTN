@extends('welcome')
@section('content')
<div class="features_items">
						<h2 class="title text-center">Kết quả tìm kiếm</h2>
					    @foreach($search_phim as $key =>  $phim)
						<a href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('upload/phims/'.$phim->phim_image)}}" alt="" />
											<h2>{{$phim->phim_name}}</h2>
											<p><b>Thời Lượng:</b> {{$phim->phim_thoiluong}}</p>
											
											<a align="left" href="#" class="btn btn-default add-to-cart"><i class="fa fa-heart"></i>Yêu Thích</a>
											<a align="right" href="{{URL::to('/chi-tiet-phim/'.$phim->phim_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua vé</a>
										</div>
								</div>
							</div>
						</div>
						</a>
						@endforeach		
					</div>

                   
@endsection 