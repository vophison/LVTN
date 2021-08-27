@extends('welcome')
@section('content')
<style>
  tr{transition: all .25 ease-in-out}
  tr:hover {background-color: #EEE;cursor: pointer;}

  .nutxoa{
    background-color: #white; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }

</style>


<section class="login-block">

    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Thông tin người đặt</h2>
           <!-- 
                        @if(session('thanhcong'))
                            
                              <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                            
                        @endif  --> 
 <form class="login-form" id="loginForm" method="post" action="/checkout"> 
  <input style="color:white" type="hidden" name="_token" value="{{csrf_token()}}" />
  
  <input type="hidden" name="phimid_hidden" class="form-control" value="{{$phimid_hidden}}">
  
  <input type="hidden" name="phong_rap" class="form-control" value="{{$phong_rap}}">

  
  <input type="hidden" name="suatchieu"  class="form-control" value="{{$suatchieu}}">
  
  @if(session('customer_id'))
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email</label>
    <input type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Email người đặt" value="{{$test->customer_email}}">
    <span class="error-message">{{ $errors->first('email') }}</span>
    
  </div>

    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Họ tên</label>
      <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Họ tên người đặt" pattern="[^!@#$%&*()-=_+*^]{1,30}" title="Họ tên không được chứa số hoặc ký tự đặc biệt"
      value="{{$test->customer_name}}">
      <span class="error-message">{{ $errors->first('hoten') }}</span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Số điện thoại</label>
      <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại người đặt"
      value="{{$test->customer_phone}}">
      <span class="error-message">{{ $errors->first('sdt') }}</span>
   </div>
   @endif
   <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Chọn ghế</label>
       <select name="chongoi" id="chongoi" class="form-control" >
        @for($i =1;$i <= 100;$i++)
        @if(!(in_array($i,$cho)))
      
                <option value="{{$i}}"> A{{$i}}</option>
      @endif
          @endfor
       </select>
  </div>

    <div class="form-group" style="text-align: center;width: ">
      <input id="change" type="button" value="Chuyển"  style="width:100px ;height: 45px"class="btn btn-outline-info" title="Chuyển thông tin người đặt sang người đi" onclick="Change();" > 
     
   </div>
 
 
    <!-- <div class="form-check">
      <button type="submit" class="btn btn-login float-right" id="button-xacnhan"></button>
    </div> -->
    <br>
  <br>

    <!-- <div class="copy-text"> <i class="fa fa-heart">Chào mừng quý khách</i>  </div> -->
        </div>



<div class="col-md-8 banner-sec">
<!-- <div class="container-lg"> -->
  
               <b><h2 class="text-center" style="color: green">Chọn ghế</h2></b>
               <hr>
            
               <div class="row">
               
               <table class="table table-bordered" >
                <thead >    
                <tr> <td>
                  <div style="width:30px;height:30px;background:white none repeat scroll 0% 0%"></div>  
                <b style="color:black;"> Còn trống </b></td>
               <td> <div style="width:30px;height:30px;background:red none repeat scroll 0% 0%"></div>  
                <b style="color:red;">   Hết</b></td>
              <td> <div style="width:30px;height:30px;background:yellow none repeat scroll 0% 0%"></div>  
                <b style="color:red;">   Đang chọn</b></td> </tr>
              </thead>
                  
                   @for($i =1;$i <=$hang * $cot;$i++)    
                   
                      @if(in_array($i,$cho) )
                        <td style="text-align: center; background-color:red;" >A{{$i}}</td>
                        @else 
                        <td style="text-align: center;background-color:black  " > 
                           <button class="btn btn-outline-success add-new" title="Vui lòng điền thông tin" id="themve"
                            value="{{$i}}" onclick="addHtmlTableRow(this);" />A{{$i}}</td>
                      @endif
                
                    
                      @if($i % $cot == 0)
                        <tr></tr>
                        @endif
                    @endfor   
         
                     
                                 
                                  
                                          
                               
    
            </table>
               </div> 
            
              
                 <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                    
                        <th style="text-align: center;">Chỗ ngồi</th>
                        <th style="text-align: center;">Cập nhật</th>

                    </tr>
                </thead>
                <div class="col-sm-8"> 
                  <small>Ghế trống: <b id="soghe">{{$soghe}}<b></small>
                 </div>
                 <b><h2 class="text-center" style="color: white">Order Ghế</h2></b>
            </table>

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"> 
                       
                      </div>
                  
                    
                
                </div>
                <hr class="my-4">
                   <!-- <div class=" text-center"> -->
                <div >
                Tổng số lượng vé đã đặt: <input class="btn btn-info" type="text" name="soluong" id="soluong" value="Chưa có vé" readonly style="width: 120px; text-align: center;">
                <span class="error-message">{{ $errors->first('soluong') }}</span> 

                </div>
                
                <button type="submit" class="btn btn-login float-right" id="button-xacnhan">Xác Nhận</button>
                <br>
            </div>
            </div>
           

       
</form>
</section>
<style type="text/css">
   .error-message { color: red; }
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
}*/
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.khung{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 0 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}

</style>
<script>

            // add Row
            function addHtmlTableRow(o)
            {  var test=o.value;
           console.log(test);
                // get the table by id
                // create a new row and cells
                // get value from input text
                // set the values into row cell's
                const buttons = document.getElementsByTagName("button");
                for (let i = 0; i < buttons.length; i++) {
                  if( buttons[i].value == test)
            { buttons[i].disabled = true;
    //           setTimeout(function() {
    //             buttons[i].disabled = false;
    // }, 50000);
                   buttons[i].style.background="yellow";}
               }
   

            var table = document.getElementById("table");

            /* 3 option */

       
            ///////////////////

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            //Cột 1
          

            var cell6 = row.insertCell(0);
            var element6 = document.createElement("input");
            element6.type="text";
            element6.setAttribute('class', 'form-control');
            element6.name="chongoinguoixem[]";
               
            element6.required=true;
            element6.readOnly=true;
            console.log(o.value);
            element6.value=o.value ;
            element6.value.innerText="test";
            console.log(element6.value);
            cell6.appendChild(element6);
            element6.setAttribute('form','loginForm');

            var cell5 = row.insertCell(1);
            var element5 = document.createElement('button');
            var text = document.createTextNode("Xóa");
            element5.appendChild(text);
            element5.title = "Xóa";
            // element5.style.background = 'initial';
            // element5.style.backgroundColor =   "#A9E2F3"
            element5.setAttribute('class', 'btn btn-outline-danger');
            element5.style.fontSize = 'smaller';
            element5.style.height = '29px';
            element5.style.textAlign = 'justify';
            // element5.class = "btn btn-outline-info";
            element5.onclick = function(){removeSelectedRow(this,o)};
            cell5.appendChild(element5);
              document.getElementById("soluong").value = table.rows.length-1;
              var soghe = document.getElementById("soghe").innerText = document.getElementById("soghe").innerText - 1;
              if(soghe == 0)
              {
               document.getElementById("themve").disabled = true;
                alert("Đây là ghế cuối cùng còn trống của phòng, không thể đặt thêm vé tiếp theo. Quý khách vui lòng thông cảm");
              }


            }

            function removeSelectedRow(r,o)
            {
          
   
                var i = r.parentNode.parentNode.rowIndex;
                
                document.getElementById("table").deleteRow(i);

                document.getElementById("soluong").value = table.rows.length-1;
                document.getElementById("soghe").innerHTML++;
                 document.getElementById("themve").disabled = false;
                 var show = document.getElementById("soluong").value;
                 if(show == 0 )
                 {
                  document.getElementById("soluong").value = "Chưa có vé";
                  document.getElementById("change").disabled = false;
                 }

              
            
                 if(o === undefined )
               {   
                 var test=document.getElementById("chongoi").value;
               
               }else
               {
                 var test = o.value;
               }
                console.log(test);
                const buttons = document.getElementsByTagName("button");
                for (let i = 0; i < buttons.length; i++) {
                  
                  if( buttons[i].value == test)
               { buttons[i].disabled = false;
                  buttons[i].setAttribute('class','btn btn-outline-success add-new');
                   buttons[i].style.background="white";}
               }
               
            }
            function Change()
            {

          

               var table = document.getElementById("table");

            /* 3 option */
            
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
         

            var cell6 = row.insertCell(0);
            var element6 = document.createElement("input");
            element6.setAttribute('class', 'form-control');
            element6.type="text";
            element6.name="chongoinguoixem[]";
            element6.required=true;
            element6.value=document.getElementById("chongoi").value;
            
            console.log(element6.value);
            element6.readOnly=true;
            cell6.appendChild(element6);
            element6.setAttribute('form','loginForm');

              var test = element6.value;
                  console.log(test);
                  const buttons = document.getElementsByTagName("button");
                  for (let i = 0; i < buttons.length; i++) {
                    if( buttons[i].value == test)
              { buttons[i].disabled = true;

                    buttons[i].style.background="yellow";}
                }



            var cell5 = row.insertCell(1);
            var element5 = document.createElement('button');
            var text = document.createTextNode("Xóa");
            element5.appendChild(text);
            element5.title = "Xóa";
            // element5.style.background = 'initial';
            // element5.style.backgroundColor =   "#A9E2F3"
            element5.setAttribute('class', 'btn btn-outline-danger');
            element5.style.fontSize = 'smaller';
            element5.style.height = '29px';
            element5.style.textAlign = 'justify';
            // element5.class = "btn btn-outline-info";
            element5.onclick = function(){removeSelectedRow(this)};
            cell5.appendChild(element5);
            document.getElementById("change").disabled = true;
            document.getElementById("soluong").value = table.rows.length-1;
              var soghe = document.getElementById("soghe").innerText = document.getElementById("soghe").innerText - 1;
              if(soghe == 0)
              {
               document.getElementById("themve").disabled = true;
                alert("Đây là ghế cuối cùng còn trống của phòng, không thể đặt thêm vé tiếp theo. Quý khách vui lòng thông cảm");
              }
            }
        </script>


@endsection
