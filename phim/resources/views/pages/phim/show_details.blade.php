@extends('welcome')
@section('content')

<div class="product-details"><!--product-details-->
<div class="col-sm-1"></div>
						<div class="col-sm-3">
							<div class="view-product">
							@foreach($phim_details as $key => $value)
								<img src="{{URL::to('/upload/phims/'.$value->phim_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h3>{{$value->phim_name}}</h3>
								<p>ID phim: {{$value->phim_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/order-cart')}}" method="POST"> <!-- dat ve (suat chieu, rap ->ghe ->combo) -->
									{{csrf_field()}}
								<span>
									<input name="phimid_hidden" type="hidden"  value="{{$value->phim_id}}" />
								</span> 
								@if($value->phim_oldnew==1)<!--/0-new-->
								@if(session()->has('data'))
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Mua vé
									</button>
								@else
								<i class="fa fa-shopping-cart"></i>
									Đăng nhập để mua vé
								
								@endif
								@else	
								<i class="fa fa-shopping-cart"></i>
									Phim hiện chưa được công chiếu
								@endif
								</form>
								<p><b>Thể Loại:</b> {{$value->theloaiphim_name}}</p>
								<p><b>Đạo Diễn: </b>{{$value->phim_daodien}}</p>
								<p><b>Diễn Viên:</b> {{$value->phim_dienvien}}</p>
								<p><b>Quốc Gia:</b> {{$value->phim_quocgia}}</p>
								<p><b>Thời Lượng:</b> {{$value->phim_thoiluong}}</p>
								<p><b>Nghiêm Cấm:</b> {{$value->phim_rated}}</p>

								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>

					</div><!--/product-details-->
	
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li class="active"><a href="#details" data-toggle="tab">Chi tiết phim</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Trailer</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane fade active in" id="details" >
							<p>{!!$value->phim_noidung!!}</p>  <!-- dau ! de lam xuat hien ki tu dac biet -->						
							</div>
							<div class="tab-pane fade" id="companyprofile" >
							<center>
							<iframe width="700" height="400" src="{{$value->phim_trailer}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</center>								
							</div>
							
							
						</div>
					</div><!--/category-tab-->
@endforeach
                    <div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Gợi ý Phim cùng thể loại</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">	
								@foreach($phim_related as $key =>$lienquan)
								<a href="{{URL::to('/chi-tiet-phim/'.$lienquan->phim_id)}}">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
										<div class="single-products">
										<div class="productinfo text-center">
											<img src="{{URL::to('upload/phims/'.$lienquan->phim_image)}}" alt="" />
											
											<p>{{$lienquan->phim_name}}</p>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Mua vé</a>
										</div>
								</div>
										</div>
									</div>
                                    
                                   </a>
                                @endforeach    
								</div>
                          
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->
					
@endsection