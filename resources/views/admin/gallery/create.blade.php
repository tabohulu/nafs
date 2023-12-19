@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form class="w-full max-w-lg" action="/dashboard/gallery" method="POST" id="product-form" enctype="multipart/form-data">
  {{ csrf_field() }}
  
  <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning">Gallery Image</h4>
      <hr>
      <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Image File</label>
        <div class="col-sm-5">
          <input class="required" type="file" name="img" accept="image/png, image/gif, image/jpeg" />

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">Image Name</label>
            </div>
            <input type="text" name="name" id="name" class="required form-control">
          </div>
        </div>

      </div>

      



      
      <div class="form-group row justify-content-left" style="margin-top: 50px;">
    
        <div class="col-sm-4"></div>
      <button id="reserve_btn" class="col-sm-4 btn btn-success center-block">Add Image</button>

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