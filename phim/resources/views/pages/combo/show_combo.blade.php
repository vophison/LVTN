@extends('welcome')
@section('content')

<div class="product-details"><!--product-details-->
<div class="col-sm-1"></div>
						<div class="col-sm-3">
							<div class="view-product">
							@foreach($combo_details as $key => $value)
								<img src="{{URL::to('/upload/combos/'.$value->combo_image)}}" alt="" />
								<h3>ZOOM</h3>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h3>{{$value->combo_name}}</h3>
								<p>ID combo: {{$value->combo_id}}</p>
								<img src="images/product-details/rating.png" alt="" />
								<form action="{{URL::to('/order-cb')}}" method="POST"> <!-- dat ve (suat chieu, rap ->ghe ->combo) -->
									{{csrf_field()}}
								<span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" value="1" />
									<input name="comboid_hidden" type="hidden"  value="{{$value->combo_id}}" /> 
								</span> 
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Mua 
									</button>
									
								</form>
								<p><b>Giá:</b> {{$value->combo_gia}}</p>
								<p><b>Mô tả:</b> {{$value->combo_desc}}</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>

					</div><!--/product-details-->

@endforeach
                   
					

@endsection