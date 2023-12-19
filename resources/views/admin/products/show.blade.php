@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{ url('/dashboard/products/'.$product->id.'/edit') }}" method="GET">
{{ csrf_field() }}
    <div class="container">
      <div class="row card-body">
      <h4 class="card-title color-warning" >Products</h4>
      <a href="/dashboard/products">To Products</a>
        <hr>
        <div class="col-lg-3 pull-lg-8">
        <img style="margin-bottom: 30px;" class=" card-img-top" src="/img/products/{{$product->img}}">
        </div>

        <div class="col pl-lg-9 push-lg-4">
        <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-5">
          <div class="form-control" style="overflow-x: hidden;">{{$product->img}}</div>

          </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Product Name</label>
              </div>
              <div class="form-control">{{$product->name}}</div>
            </div>
          </div>

        </div>

        <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Variety</label>
        <div class="col-sm-4">
        <div name="variety" id="variety" class="required form-control">
        {{$product->variety}}
      </div>

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size">Size</label>
            </div>
            <div class="col-sm-2 form-control">
            @if($product->size=='250') 
            {{'250ml'}}
            @elseif($product->size=='500') 
            {{'500ml'}}
            @elseif($product->size=='1000') 
            {{'1.0L'}}
            @elseif($product->size=='1500') 
            {{'1.5L'}}
            @elseif($product->size=='2000') 
            {{'2.0L'}}
            @endif
        </div>
          </div>
        </div>

      </div>

      
        
       
        

        
    

    <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label">Stock</label>
          <div class="col-sm-5">
            <div class="form-control">
            {{$product->stock_status}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price">Product Price(GH&#8373;)</label>
              </div>
              <div class="form-control">{{$product->price}}</div>
            </div>
          </div>

        </div>

        <div class="form-group row">
       
       <div class="col-sm-2 col-form-label">
       <h5 >Description</h5>
       </div>
       <div class="col-sm-10" >
         <ul id="description">
          @foreach($productdescriptions as $description)
         <li style="margin-bottom: 20px;" id="item-0">
           <div class="form-group row">
             <div class="col-sm-11">
             <div class="form-control">{{$description->content}}</div>
             </div>
                      
           </div>            
         </li>
         @endforeach
         </ul>
         <!-- <input type="text" name="description[]" placeholder="一行ずついれてください。"> -->

         <!-- <textarea name="description" class="form-control" id="description" rows="5" placeholder="内容"> </textarea> -->
       </div>

     </div>
     <div class="form-group row">
     <button type="submit" class="col-sm-4 btn btn-warning center-block">
        Edit
      </button>
      <div class="col-sm-1"></div>

      <form action="{{ url('/dashboard/products/'.$product->id) }}" method="POST">
									{{ csrf_field() }}
                                    {{method_field('DELETE')}}
									 	<button type="submit" class="btn btn-danger col-sm-4">
											<i class="glyphicon glyphicon-file"></i>Delete
									 </button>
								 </form>
     </div>

     </div>
     
      
      </div>
      

        
    </div>

      
</form>


       
      

    

