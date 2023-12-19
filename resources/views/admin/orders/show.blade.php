@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{ url('/dashboard/orders/'.$order->id.'/edit') }}" method="GET">
{{ csrf_field() }}
    <div class="container">
      <div class="row card-body">
      <h4 class="card-title color-warning" >Orders</h4>
      <a href="/dashboard/orders">To Orders</a>
        <hr>
        <div class="col-lg-3 pull-lg-8">
        <img style="margin-bottom: 30px;" class=" card-img-top" src="/img/products/{{$product->img}}">
        </div>

        <div class="col pl-lg-9 push-lg-4">

        <div class="form-group row">
        <label for="img" class="col-sm-2 col-form-label">Customer Name</label>
        <div class="col-sm-4">
        <div name="variety" id="variety" class="required form-control">
        {{$order->customer_name}}
      </div>

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size">Customer Number</label>
            </div>
            <div class="col-sm-2 form-control">
            {{$order->customer_number}}
        </div>
          </div>
        </div>

      </div>

        <div class="form-group row">
        
          <label for="img" class="col-sm-2 col-form-label">Product</label>
          <div class="col-sm-5">
          <div class="form-control" style="overflow-x: hidden;">{{$product->name}}({{$product->variety}},
          @if(($product->size/1000)<1) 
          {{$product->size}}ml
          @else 
          {{$product->size/1000}}L
          @endif)</div>

          </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Payment Option</label>
              </div>
              <div class="form-control">@if($order->payment_method == 'momo') Mobile Money @else Cash @endif</div>
            </div>
          </div>

        </div>

        <div class="form-group row" @if($order->payment_method == 'cash')style="display: none;" @endif>
        <label for="img" class="col-sm-2 col-form-label">Account Name</label>
        <div class="col-sm-4">
        <div name="variety" id="variety" class="required form-control">
        {{$order->momo_name}}
      </div>

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size">Account Number</label>
            </div>
            <div class="col-sm-2 form-control">
            {{$order->momo_number}}
        </div>
          </div>
        </div>

      </div>

    <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label">Delivery Method</label>
          <div class="col-sm-5">
            <div class="form-control">
            {{$order->delivery_method}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price">Location</label>
              </div>
              <div class="form-control">{{$order->location}}</div>
            </div>
          </div>

        </div>


        <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label">Quantity</label>
          <div class="col-sm-5">
            <div class="form-control">
            {{$order->quantity}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price">Total Cost(GH&#8373;)</label>
              </div>
              <div class="form-control">{{$order->total}}</div>
            </div>
          </div>

        </div>

        <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label">Order Serial Number</label>
          <div class="col-sm-5">
            <div class="form-control">
            {{$order->order_sn}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price">Shipped</label>
              </div>
              <div class="form-control">@if($order->shipped)Yes @else No @endif</div>
            </div>
          </div>

        </div>
        <div class="form-group row">
        <div class="col-sm-12">
            <div class="input-group mb-3">
        <div class="input-group-prepend">
                <label class="input-group-text" for="reviewurl">Review URL</label>
              </div>
              <div class="form-control">
              {{url('/review/order_sn/'.$order->order_sn.'/pid/'.$order->product_id.'/create')}}
              </div>
            </div>
        </div>
        

        </div>
        
     <div class="form-group row">
     <button type="submit" class="col-sm-2 btn btn-warning center-block" @if($order->cancelled == 1) disabled @endif>
        Edit
      </button>
      <div class="col-sm-1"></div>
      <form action="{{ url('/dashboard/orders/'.$order->id) }}" method="POST">
        {{ csrf_field() }}
                          {{method_field('DELETE')}}
          <button type="submit" class="btn btn-danger col-sm-2">
            <i class="glyphicon glyphicon-file"></i>Delete
          </button>
        </form>

      
     </div>
     <div class="form-group">
     <form action="{{ url('/dashboard/order/cancel/'.$order->id) }}" method="POST">
          {{ csrf_field() }}
          @if($order->cancelled == 0)
          <button type="submit" class="col-sm-2 btn btn-danger">
              <i class="glyphicon glyphicon-file"></i>Cancel
            </button>
          @else 
          <button type="submit" class="col-sm-2 btn btn-success">
              <i class="glyphicon glyphicon-file"></i>Restore
            </button>
          @endif
            
          </form>
     </div>

     </div>
     
      
      </div>
      

        
    </div>

      
</form>


       
      

    

