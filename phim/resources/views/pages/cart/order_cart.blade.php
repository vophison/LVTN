@extends('welcome')
@section('content')
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.pack.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><b><a href="{{URL::to('/trangchu')}}">Home</a></b></li>
				  <li class="active">Chọn Suất chiếu</li>
				</ol>
			</div>
            <div class="text-center"><h2>Chọn suất chiếu</h2></div>
            
                    <div class="col-sm-2">
                    
                    </div>
                    <div class="col-sm-7">
					<form role="form" action="{{URL::to('/order-ghe')}}" method="post">
                                {{csrf_field()}}
                                <input name="phimid_hidden" type="hidden"  value="{{$phim_info->phim_id}}" id="phimid_hidden"/>
            
                                <div class="form-group">
                                <label for="exampleInputEmail1"><h3>Thành Phố</h3></label>
                                    <select name="thanhpho_cate" class="form-control input-lg m-bot15" id="thanhpho_cate">
										@foreach($cate_thanhpho as $key => $thanhpho)  
                                      	 	 <option value="{{($key)}}">{{($thanhpho)}}</option>   
                                        @endforeach
                                    </select>			
                                </div>
								<div class="form-group">
                                <label for="exampleInputEmail1"><h3>Rạp</h3></label>
                                    <select name="phong_rap" class="form-control input-lg m-bot15" id="rap">
                                    </select>
                                </div>
                                <div class="form-group">
                                <label for="exampleInputEmail1"><h3>Giờ chiếu và phòng</h3></label>
                                <select name="suatchieu_date" class="form-control input-lg m-bot15" id="suatchieu_date">

                                </select>
                                <div id="suatchieu"></div>
                                </div> 
                           <div class="text-center"> 
                         <button type="submit" href="{{URL::to('/order-ghe')}}" class="btn btn-info">Đặt Suất Chiếu</button>
                            </div>
                     </form>
                </div>
                <div class="col-sm-2">
                    
                    </div>
			</div>
	
	
	</section> 
    <script type="text/javascript"> 
    // ajax rạp theo thành phố
  
    $('#thanhpho_cate').change(function(){ 
       var thanhpho_id = $(this).val();
       var phim_id=document.getElementById('phimid_hidden').value;
        var _token = $('input[name="_token"]').val();

         $.ajax({
                url:"{{url('/chon-rap-order')}}",
                method:"POST",

                data:{_token:_token,thanhpho_id:thanhpho_id,phim_id:phim_id},

                success:function(data)
                    {
						console.log(data);
                        $('#rap').html(data);
               
                    }
            });
    });
   
    
 
// ajax phòng theo giờ chiếu và ngày rạp
    $(document).ready(function(){
        $('#rap').change(function(){
            var thanhpho_id = document.getElementById('thanhpho_cate').value;
            
           
       var rap_id = $(this).val();
      
       var phim_id=document.getElementById('phimid_hidden').value;
        var _token = $('input[name="_token"]').val();
           
         $.ajax({
                url:"{{url('/chon-suatchieu-order')}}",
                method:"POST",

                data:{_token:_token,rap_id:rap_id,phim_id:phim_id,thanhpho_id:thanhpho_id},
            
                success:function(data)
                    {
                        console.log(data);
                        $('#suatchieu_date').html(data);
                     
                    }
            });
    });  
        });
    // ngày không hợp lệ
    function TDate() {
    var UserDate = document.getElementById("date").value;
    var ToDate = new Date();

    if (new Date(UserDate).getDate() < ToDate.getDate()) {
          alert('Ngày không hợp lệ');
          document.getElementById("date").value=ToDate.getDate();
          return false;
     }
   
    return true;
}
    </script>

@endsection