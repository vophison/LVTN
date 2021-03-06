<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | TikiLazada-Cinema</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +0354161612</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> TikiLazadaCinema@gmail.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/tuongvupoodbest/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-youtube"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://www.instagram.com/ntvvuu/"><i class="fa fa-instagram"></i></a></li>
								<li><a href="https://www.google.com/gmail/"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{asset('frontend/images/kenhcine.gif')}}" alt="" /></a>
						</div>
						<div class="btn-group pull-left">
							<div class="btn-group">
								<button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
									VietNamese
									<span class="caret"></span>
								</button>
								<ul class="dropdown-menu">
									<li><a href="caret">EngLish</a></li>
								</ul>
							 </div> 
						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav">
							<!-- 	<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-user"></i>T??i Kho???n</a></li> -->
								
								<?php
									$customer_id = Session::get('customer_id');
									$customer_name = Session::get('customer_name');
									$name = Session()->get('customer_name');
									$id = Session()->get('customer_id');
									if($customer_id!=null){
								?>
								<li><a href="{{URL::to('/thongtin-kh/'.$id)}}"><i class="fa fa-user"></i>{{  Session::get('customer_name')}}</a></li>
								<li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i>????ng Xu???t</a></li>
								<li><a href="#"><i class="fa fa-star"></i> Y??u Th??ch</a></li>
								<li><a href="#"><i class="fa fa-crosshairs"></i> Thanh To??n</a></li>
								<li><a href="{{URL::to('/show-vedat')}}"><i class="fa fa-shopping-cart"></i>L???ch s??? mua v??</a></li>
								<?php
								} else{
									?>	
									<li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i>????ng Nh???p</a></li>
									<li><a href="{{URL::to('/thongtinkhachhang')}}"><i class="fa fa-star"></i> Y??u Th??ch</a></li>
								<?php
								}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
		
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-8">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="{{URL::to('/trangchu')}}" class="active">Trang Ch???</a></li>
								<li class="dropdown"><a href="#">R???p TikiLazada<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">

                                       		 <li><a href="{{URL::to('/phimdangchieu')}}">Phim h??m nay</a></li>
									
											<li><a href="{{URL::to('/phimsapchieu')}}">Phim s???p chi???u</a></li>
									
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">Th??? Lo???i Phim<i class="fa fa-angle-down"></i></a>		
                                    <ul role="menu" class="sub-menu">
								
										@foreach($theloaiphim as $key => $cate) 
                                       		 <li><a href="{{URL::to('/the-loai-phim/'.$cate->theloaiphim_id)}}">{{$cate->theloaiphim_name}}</a></li>
										@endforeach
									
                                    </ul>
                                </li> 
								<li class="dropdown"><a href="#">S??? ki???n<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Tin T???c</a></li>
										<li><a href="blog-single.html">??u ????i</a></li>
                                    </ul>
                                </li> 
							</ul>
						</div>
					</div>
					<div class="col-sm-4">
						<form action="{{URL::to('/tim-kiem')}}" method="post">
						{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="text" name="keywords_submit" placeholder="Nh???p t??? kh??a"/>
							<input type="submit" name="search_items" class="btn-info" value="T??m"/>
						</div>
						
						
						</form>
						<form action="{{URL::to('/tim-kiemday')}}" method="post">
						{{csrf_field()}}
						<div class="search_box pull-right">
							<input type="date" name="ngaychieu" onchange="TDate()" min="<?php echo date('Y-m-d') ?>"/>
							<input type="submit" name="search_items" class="btn-info" value="T??m"/>
						</div>
						
						
						</form>
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
		
	</header><!--/header-->
	@if(session('thongbao'))
            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>
            @endif
	<!-- <section id="slider"> --><!--slider-->
	<!-- 	<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
							<div class="col-sm-6">
									<h1><span>TikiLazada</span>-Cinema</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Kh??m ph?? ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{('frontend/images/2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('frontend/images/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>TikiLazada</span>-Cinema</h1>
									<h2>100% Responsive Design</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Kh??m ph?? ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{('frontend/images/2.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('frontend/images/pricing.png')}}"  class="pricing" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>TikiLazada</span>-Cinema</h1>
									<h2>Free Ecommerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Kh??m ph?? ngay</button>
								</div>
								<div class="col-sm-6">
									<img src="{{('frontend/images//3.jpg')}}" class="girl img-responsive" alt="" />
									<img src="{{('frontend/images/pricing.png')}}" class="pricing" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section> --><!--/slider-->
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12 padding-right">
					@yield('content')


				</div>
			</div>
		</div>
	</section>
	<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
				<div class="col-sm-2">
						<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/1.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/2.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/3.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/4.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/5.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/6.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/7.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/11.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/8.png')}}" alt="" /></a>
						</div>
					</div>
					<div class="col-sm-2">
					<div class="logo pull-left">
							<a href="{{URL::to('/trangchu')}}"><img src="{{('hi/9.png')}}" alt="" /></a>
						</div>
					</div>			
				</div>
			</div>
		</div><!--/header-middle-->
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
		
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>TikiLazada</span>-Cinema</h2>
							<p>Mang ?????n cho b???n nh???ng tr???i nghi???m tuy???t v???i nh???t</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<!-- <div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('hi/facebook.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2021</h2>
							</div> -->
						</div>
						
						<div class="col-sm-3">
							<!-- <div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="{{('hi/google.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2021</h2>
							</div> -->
						</div>
						
						<div class="col-sm-3">
							<!-- <div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
                                    <img src="{{('hi/facebook.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>20 DEC 2021</h2>
							</div> -->
						</div>
						
						<div class="col-sm-3">
							<!-- <div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
                                    <img src="{{('hi/google.png')}}" alt="" />
									</div>
									<div class="overlay-icon">
										<i class="fa fa-play-circle-o"></i>
									</div>
								</a>
								<p>Circle of Hands</p>
								<h2>24 DEC 2021</h2>
							</div> -->
						</div>
					</div>
					<div class="col-sm-3">
						<div class="address">
                        <img src="{{('frontend/images/map.png')}}" alt="" />
							<p>180 Cao L???, Ph?????ng 4, Qu???n 8, VietNam</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-widget">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chi nh??nh c???n Th??</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">R???p TKLZD R???ch Mi???u</a></li>
								<li><a href="#">R???p TKLZD Sense City</a></li>
								<li><a href="#">R???p TKLZD Xu??n Kh??nh</a></li>
								<li><a href="#">R???p TKLZD H??ng V????ng</a></li>
								<li><a href="#">R???p TKLZD C??i R??ng</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chi nh??nh TP.HCM</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">R???p TKLZD T??n Ph??</a></li>
								<li><a href="#">R???p TKLZD G?? V???p</a></li>
								<li><a href="#">R???p TKLZD Qu???n 1</a></li>
								<li><a href="#">R???p TKLZD B??nh T??n</a></li>
								<li><a href="#">R???p TKLZD T??n B??nh</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chi nh??nh ???? N???ng</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">R???p TKLZD H??a Vang</a></li>
								<li><a href="#">R???p TKLZD C???m L???</a></li>
								<li><a href="#">R???p TKLZD H??a Ch??u</a></li>
								<li><a href="#">R???p TKLZD Ng?? H??nh S??n</a></li>
								<li><a href="#">R???p TKLZD L?? Du???n</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-2">
						<div class="single-widget">
							<h2>Chi nh??nh H?? N???i</h2>
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#">R???p TKLZD C???u Gi???y</a></li>
								<li><a href="#">R???p TKLZD Ho??n Ki???m</a></li>
								<li><a href="#">R???p TKLZD Timecity</a></li>
								<li><a href="#">R???p TKLZD Ho??ng Mai</a></li>
								<li><a href="#">R???p TKLZD ?????ng ??a</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3 col-sm-offset-1">
						<div class="single-widget">
							<h2>Th???c M???c Li??n H???</h2>
							<form action="#" class="searchform">
								<input type="text" placeholder="Your email address" />
								<button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
								<p>Get the most recent updates from <br />our site and be updated your self...</p>
							</form>
						</div>
					</div>
					
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright ?? 2021 TikiLazada-Cinema Inc. All rights reserved.</p>
					<p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">TikiLazada</a></span></p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
	<script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>