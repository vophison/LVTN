@extends('welcome')
@section('content')
<style>

</style>
<div class="container">
    <div id="content">
     
        <div class="container">
               
            <div id="content">
            
                <form action="{{URL::to('suattkhachhang/'.$khachhang->customer_id)}}" method="POST" enctype="multipart/form-data"  class="beta-form-checkout" >
                <input type="hidden" name="_token" value="{{csrf_token()}}"> <!-- form dùng phương thức post => cần token -->
                 
                    <div class="row">
                        <div class="col-sm-3"></div>
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                {{$err}};
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thanhcong'))
                        <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                        @endif
                        <div class="col-sm-6">
                            <h4>Sửa thông tin</h4>
                            <div class="space20">&nbsp;</div>
                           
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Họ Tên:</p></div>
                                <div class="pull-right">
                                <h4 class="color-black">
                                    <input type="text"   name="customer_name" value="{{$khachhang->customer_name}}">
                                </h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Email:</p></div>
                                <div class="pull-right">
                                <h4 class="color-black">
                                    <input type="text" name="customer_email" value="{{$khachhang->customer_email}}">
                                </h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Mật khẩu mới:</p></div>
                                <div class="pull-right">
                                <h4 class="color-black">
                                    <input type="password"  name="customer_password" value="{{$khachhang->customer_password}}" id="password">
                                </h4>
                                <input type="checkbox"  name="checkpassword" onChange="showpass()" id="checkpass"> Hiển thị
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="your-order-item">
                                <div class="pull-left"><p class="your-order-f18">Số điện thoại:</p></div>
                                <div class="pull-right">
                                <h4 class="color-black">
                                    <input type="text" name="customer_phone" value="{{$khachhang->customer_phone}}">
                                </h4>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="form-block">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div> -->
                            
                            <div class="form-block">
                                <button type="submit" class="btn btn-primary">Sửa</button>
                            </div>
                        </div>
                        
                        <div class="col-sm-3"></div>
                    </div>
                </form>
               
            </div> <!-- #content -->
        </div> <!-- .container -->
      
    </div>
</div>
@endsection 
<script>
    function showpass(e){
        // console.log(e);
        let inp=document.querySelector('#password');
        console.log(inp.type);
        if(inp.type=='password')
        {
            inp.setAttribute("type","text");
        }
        else
        {
            inp.setAttribute("type","password");
        }
    }
</script>