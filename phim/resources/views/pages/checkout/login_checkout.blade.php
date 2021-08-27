@extends('welcome')
@section('content')
            @if(session('thanhcong_mail'))
                <div class="alert alert-success text-center">
                    {{session('thanhcong_mail')}}
                </div>
            @endif 


			@if(session('actived'))
            <div class="alert alert-danger text-center" style="font-weight: bold;">
                {{session('actived')}}
            </div>
            @endif 
        
            @if(session('waiting_active'))
            <div class="alert alert-danger text-center" style="font-weight: bold;">
                {{session('waiting_active')}}
            </div>
            @endif

            @if(session('new_actived'))
                <div class="alert alert-success text-center" style="font-weight: bold;">
                    {{session('new_actived')}}
                </div>
            @endif 


<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Đăng Nhập</h2>
						<form action="{{URL::to('/login-customer')}}" method="post">
							{{csrf_field()}}
							<input type="text" name="email_account" placeholder="Tài khoản" />
							<input type="password" name="password_account" placeholder="password" />
							<span>
								<input type="checkbox" class="checkbox"> 
								Giữ đăng nhập lần sau
							</span>
							<button type="submit" class="btn btn-default">Đăng Nhập</button>
							<span>
								<a  href="#"><img src="{{('hi/google.png')}}" height="30" width="30" alt=""/></a> 
								<a  href="#"><img src="{{('hi/facebook.png')}}" height="30" width="30" alt=""/></a>
							</span>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">Hoặc</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>Chưa có tài khoản? Đăng Ký Ngay!</h2>
						<form action="{{URL::to('/add-customer')}}" method="POST">
							{{csrf_field()}}
							<div class="input-box">
                    <input type="text" name="customer_name" placeholder="Nhập tên tài khoản" value="{{old('customer_name')}}"> 
                    <span class="error-message">{{ $errors->first('customer_name') }}</span>     
                </div>
             
                <div class="input-box">                 
                    <input type="password" name="customer_password" placeholder="Nhập mật khẩu">
                    <span class="error-message">{{ $errors->first('customer_password') }}</span>
                </div>
							 
				<div class="input-box">
                    <input type="email" name="customer_email" placeholder="Nhập email" value="{{old('email')}}"> 
                    <span class="error-message">{{ $errors->first('customer_email') }}</span>     
                </div>
             
                <div class="input-box">                 
                    <input type="text" name="customer_phone" placeholder="Nhập SDT">
                    <span class="error-message">{{ $errors->first('customer_phone') }}</span>
                </div>
							<button type="submit" class="btn btn-default">Đăng Ký</button>
						</form>	
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@endsection