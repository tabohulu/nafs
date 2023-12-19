@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{url('/dashboard/orders/'.$order->id)}}" method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{method_field('PUT')}}
  <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning">Orders</h4>
      <hr>

      <div class="form-group row" id="customer_details">
          <div class="col-sm-6">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="customer_name">Customer Name</label>
              </div>
              <input type="text" class=" required form-control d-inline-block ml-2 center-item" name="customer_name" value="{{$order->customer_name}}">

            </div>
          </div>

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="customer_number">Customer Number</label>
              </div>
              <input type="tel" name="customer_number" value="{{$order->customer_number}}" class="form-control d-inline-block ml-2 center-item">


            </div>
          </div>
        </div>


      <div class="form-group row">
        <div class="col-sm-5">
        <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Product</label>
              </div>
              <select name="product_id" class="form-control" id="" value="{{$order->id}}" style="overflow-x: hidden;">
              @foreach($products as $prod)
              <option value="{{$prod->id}}">
                {{$prod->name}}({{$prod->variety}},
          @if(($prod->size/1000)<1) 
          {{$prod->size}}ml
          @else 
          {{$prod->size/1000}}L
          @endif)
                </option>
                @endforeach
              </select>
            </div>
        </div>


        <div class="col-sm-6">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Location</label>
              </div>
              <div class="form-control d-inline-block ml-2 center-item">

                <label class="radio-inline"><input type="radio" name="location" id="l1" value="Kumasi" @if($order->location == 'Kumasi') checked="true" @endif> Kumasi</label>

                <label class="radio-inline ml-3"><input type="radio" name="location" id="l2" value="Accra" style="padding-left: 15px;" @if($order->location == 'Accra') checked="true" @endif> Accra</label>

                <label class="radio-inline ml-3"><input type="radio" name="location" id="l3" value="Other" style="padding-left: 15px;" @if($order->location == 'Other') checked="true" @endif> Other</label>

              </div>


            </div>
          </div>

        </div>

        <div class="form-group row">
          <div class="col-sm-3">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Quantity</label>
              </div>
              <select id="cartSelect01" class="cartSelect01 form-control d-inline-block ml-2" style="min-width: 40px; height: auto;" value="{{$order->quantity}}">

              </select>
              <input type="hidden" name="quantity" id="quantity" value="{{$order->quantity}}">
              <input type="hidden" name="prod_price" id="prod_price" value="{{$product->price}}">
            </div>
          </div>

          <div class="col-sm-8">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Payment Options</label>
              </div>
              <div class="form-control d-inline-block ml-2 center-item">

                <label class="radio-inline"><input type="radio" name="payment_method" id="r1" value="cash" @if($order->payment_method == 'cash') checked="true" @endif> Cash</label>



                <label class="radio-inline ml-3"><input type="radio" name="payment_method" id="r2" value="momo" @if($order->payment_method == 'momo') checked="true" @endif style="padding-left: 15px;"> Mobile Money</label>

              </div>


            </div>
          </div>
        </div>

        <div @if($order->payment_method == 'cash') style="display: none;" @endif class="form-group row" id="momo_details">
          <div class="col-sm-6">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="momo_name">Account Name</label>
              </div>
              <input type="text" class=" required form-control d-inline-block ml-2 center-item" name="momo_name" value="{{$order->momo_name}}">

            </div>
          </div>

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="momo_number">Number</label>
              </div>
              <input type="tel" name="momo_number" value="{{$order->momo_number}}" class="form-control d-inline-block ml-2 center-item">


            </div>
          </div>
        </div>

        <div class="form-group row">

          <div class="col-sm-7">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Delivery Method</label>
              </div>
              <div class="form-control d-inline-block ml-2 center-item">

                <label class="radio-inline"><input type="radio" name="delivery_method" id="d1" value="pickup" @if($order->delivery_method == 'pickup') checked="true" @endif> Pickup</label>



                <label class="radio-inline ml-3"><input type="radio" name="delivery_method" id="d2" value="other" style="padding-left: 15px;" @if($order->delivery_method == 'other') checked="true" @endif> Other</label>

              </div>


            </div>
          </div>

          <div class="col-sm-4">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Total(GH&#8373;)</label>
              </div>
              <div id="total-cost" class="input-group-text form-control d-inline-block ml-2" style="min-width: 40px; height: auto;">
                {{$order->total}}
              </div>
              <input type="hidden" name="total" id="total" value="{{$order->total}}">
            </div>
          </div>
        </div>

        <div class="form-group row">

<div class="col-sm-7">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="name">Order Serial Number</label>
    </div>
    <div class="form-control d-inline-block ml-2 center-item">

      {{$order->order_sn}}

    </div>


  </div>
</div>

<div class="col-sm-4">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <label class="input-group-text" for="name">Shipped</label>
    </div>
    <div class="col-sm-2 form-control" style="background-color: white;">
    <label class="radio-inline px-2"><input type="radio" name="shipped" id="s0" value="1" @if($order->shipped == 1) checked="true"  @endif>Yes</label>

    <label class="radio-inline px-2"><input type="radio" name="shipped" id="s1" value="0" @if($order->shipped == 0) checked="true"  @endif>No</label>
    </div>
  </div>
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
    const options = [];
            let min_prod_amount = 1;
            

            for (let i = min_prod_amount; i <= 30; i++) {
                options.push(`<option value="${i}">${i}</option>`);
            }

            //get item select elem
            let cart_sel = document.getElementById("cartSelect01");
            let selected_val = document.querySelector('#quantity').value;
            let total_cost = document.getElementById('total-cost')
            

            //populate select with options
            
                for (const option of options) {
                    cart_sel.innerHTML += option;
                }
                cart_sel.value = selected_val;

                cart_sel.onchange = (e) => {
        
        total_cost.innerText = parseInt(document.getElementById('prod_price').value) * parseInt(e.target.value)
        document.getElementById('total').value = total_cost.innerText;
        document.querySelector('#quantity').value = e.target.value;
        // alert(selected_val)
    }

    //on click payment method
    let payment_method = document.getElementsByName('payment_method');
            let momo_details = document.getElementById('momo_details');
            console.log(momo_details)
            for (let i =0; i< payment_method.length;i++) {
                const method = payment_method[i]
                
                method.onchange = (e) => {
                    

                    if (e.target.value == 'cash') {
                        momo_details.style.display="none"
                    } else {
                        momo_details.style.display="flex"
                    }
                }
            }
            
            

    

    
  })
</script>