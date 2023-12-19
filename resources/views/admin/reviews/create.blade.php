@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form class="w-full max-w-lg" action="/dashboard/products" method="POST" id="product-form" enctype="multipart/form-data">
  {{ csrf_field() }}
  
  <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning">Products</h4>
      <hr>
      <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-5">
          <input class="required" type="file" name="img" accept="image/png, image/gif, image/jpeg" />

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">Product Name</label>
            </div>
            <input type="text" name="name" id="name" class="required form-control">
          </div>
        </div>

      </div>

      <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Variety</label>
        <div class="col-sm-4">
        <input type="text" name="variety" id="variety" class="required form-control">

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size">Size</label>
            </div>
            <div class="col-sm-2 form-control" style="background-color: white;">
          <label class="radio-inline px-2"><input type="radio" name="size" id="s0" value="250" checked="true">250ml</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s1" value="500" checked="true">500ml</label>
        
          <label class="radio-inline px-2"><input type="radio" name="size" id="s2" value="1000" style="padding-left: 5px;">1.0L</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s3" value="1500" style="padding-left: 5px;">1.5L</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s4" value="2000" style="padding-left: 5px;">2.0L</label>
        </div>
          </div>
        </div>

      </div>

      <div class="form-group row" style="margin-top: 15px;">
        <label for="stock_status" class="col-sm-2 col-form-label">Stock</label>
        <div class="col-sm-2">
          <label class="radio-inline"><input type="radio" name="stock_status" id="r1" value="Available" checked="true"> Available</label>
        </div>

        <div class="col-sm-3">
          <label class="radio-inline"><input type="radio" name="stock_status" id="r2" value="Sold Out" style="padding-left: 5px;">Sold Out</label>
        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="price">Price(GH&#8373;)</label>
            </div>
            <input type="text" name="price" id="price" class="required form-control">
          </div>
        </div>

      </div>

      <div class="form-group row">
       
        <div class="col-sm-2 col-form-label">
        <h5 >Description</h5>
        <div class="btn btn-warning" id="add">
        Add
        </div>
        </div>
        <div class="col-sm-10" >
          <ul id="description">
          <li style="margin-bottom: 20px;" id="item-0">
            <div class="form-group row">
              <div class="col-sm-11">
              <input class="required form-control" id="description-0" type="text" name="description[]">
              </div>
                       
            </div>            
          </li>
          </ul>
          
        </div>

      </div>



      
      <div class="form-group row justify-content-left" style="margin-top: 50px;">
    
        <div class="col-sm-4"></div>
      <button id="reserve_btn" class="col-sm-4 btn btn-success center-block">Create Product</button>

    </div>
    </div>



  </div>


</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>

<script>
  $.extend($.validator.messages, {
        required: "Please Fill this field",
        number: "Please enter a valid vumber",
        digits: "Numeric Values Only!"
    });

    let form = $("#product-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) {
                let errorPlace = $(element)
                    .closest(".form-group")
                    .find(".errorPlace");
                if (errorPlace.length > 0) {
                    errorPlace.html(error);
                } else {
                    element.after(error);
                }
            },
        });

        function formCheck() {
            if (!form.valid()) {
                $('.error:not("span")').eq(0).focus();
            }
            return form.valid();
        }

  document.addEventListener('DOMContentLoaded', function() {
    let sub_btn = document.getElementById('reserve_btn');
            sub_btn.onclick=(e)=>{
                e.preventDefault()
                if(formCheck()){
                    document.getElementById('product-form').submit();
                }
            }

    let receiveDate = $("#date").datepicker({
      dateFormat: "yy-mm-dd",
      monthNames: [
        "1月",
        "2月",
        "3月",
        "4月",
        "5月",
        "6月",
        "7月",
        "8月",
        "9月",
        "10月",
        "11月",
        "12月",
      ],
      minDate: new Date(),
    });

    let inputs=[];
    let add = document.getElementById('add');
    let ul = document.getElementById('description')
    let noLists = ul.getElementsByTagName('li').length;
    
    add.onclick=()=>{
      let lis = ul.getElementsByTagName('li');
      inputs=[];
    for(let i=0;i<lis.length;i++){
      const ip =lis[i].getElementsByClassName('row')[0].getElementsByClassName('col-sm-11')[0].querySelector('input');
      inputs.push(
        {id:ip.id,
          value:ip.value
      })
    }

      ul.insertAdjacentHTML('beforeend',
      `
      <li style="margin-bottom: 20px;" id="item-${noLists}">
            <div class="form-group row">
              <div class="col-sm-11">
              <input class="form-control required" id="perks-${noLists}" type="text" name="description[]">
              </div>
              <div class="col-sm-1 btn btn-danger del" id="${noLists}">
              削除
              </div>            
            </div>            
          </li>
      `)
      //add ondel listener
      let del = document.getElementById(`${noLists}`);
      del.onclick=(e)=>{
        document.getElementById(`item-${e.target.id}`).remove();
      }
      noLists+=1;

      
    }
  })
</script>