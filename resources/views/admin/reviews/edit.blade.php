@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{url('/dashboard/products/'.$products->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('PUT')}}
    <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning" >Products</h4>
        <hr>
        <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-5">
            <label class="btn btn-success" for="img">Select</label>
          <input type="text" id ="old_img" name ="old_img" readonly value="{{$products->img}}" />
          <input type="file" id ="img" name="img" accept="image/png, image/gif, image/jpeg"  style="display: none;"/>
          </div>
          
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Product Name</label>
              </div>
              <input type="text" name="name" id="name" class="form-control" value="{{$products->name}}">
            </div>
          </div>

        </div>

        <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Variety</label>
        <div class="col-sm-4">
        <input type="text" name="variety" id="variety" class="required form-control" value="{{$products->variety}}">

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size">Size</label>
            </div>
            <div class="col-sm-2 form-control" style="background-color: white;">
          <label class="radio-inline px-2"><input type="radio" name="size" id="s0" value="250"  style="padding-left: 5px;"@if($products->size=='250') checked @endif>250ml</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s1" value="500"  style="padding-left: 5px;"@if($products->size=='500') checked @endif>500ml</label>
        
          <label class="radio-inline px-2"><input type="radio" name="size" id="s2" value="1000" style="padding-left: 5px;"@if($products->size=='1000') checked @endif>1.0L</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s3" value="1500" style="padding-left: 5px;"@if($products->size=='1500') checked @endif>1.5L</label>

          <label class="radio-inline px-2"><input type="radio" name="size" id="s4" value="2000" style="padding-left: 5px;"@if($products->size=='2000') checked @endif>2.0L</label>
        </div>
          </div>
        </div>

      </div>
    

    <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-5">
            <div class="form-control" style="background-color: white;">
            <label class="radio-inline"><input type="radio" name="stock_status" id="r1" value="Available"@if($products->stock_status=='Available') checked @endif> Available</label>
            
            <label class="radio-inline"><input type="radio" name="stock_status" id="r2" value="Sold Out"@if($products->stock_status=='Sold Out') checked @endif>Sold Out</label>
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price">Product Price(GH&#8373;)</label>
              </div>
              <input type="text" name="price" id="price" class="form-control" value="{{$products->price}}">
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
          @foreach($productdescriptions as $description)
         <li style="margin-bottom: 20px;" id="item-0">
           <div class="form-group row">
             <div class="col-sm-11">
             <input class="form-control" id="description-0" type="text" name="old_description[]" value="{{$description->content}}">
             <input name="old_description_id[]" type="hidden" value="{{$description->id}}">
             </div>
             
             <div class="col-sm-1">
             <form action=""></form>
            <form action="/dashboard/product/descriptiondelete" method="GET">
              @csrf
            <input name="id" type="hidden" value="{{$description->id}}">
              <button type="submit" class="btn btn-danger">
              Delete
              </button>
            </form>
             </div>
                      
           </div>            
         </li>
         @endforeach
         </ul>
       </div>

     </div>

      

      <button type="submit" class="btn btn-success center-block">
        Update
      </button>
      </div>

      </div>
</form>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log(document.getElementById('img'))

    document.getElementById('img').onclick=(e)=>{
    console.log('here')
    document.getElementById('img').value=null;
  }
  
  document.getElementById('img').onchange=(e)=>{
    console.log(e.target.value.split('/'))
    document.getElementById('old_img').value=e.target.value.split('\\')[2];
  }

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
              <input class="form-control" id="perks-${noLists}" type="text" name="description[]">
              </div>
              <div class="col-sm-1 btn btn-danger del" id="${noLists}">
              Delete
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
       
      

    

