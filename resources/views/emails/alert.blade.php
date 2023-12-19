<div class="container">
      <div class="row card-body">
      <h4 class="card-title color-warning" >Order Details</h4>
        <hr>
        

        <div class="col pl-lg-9 push-lg-4">
        <div class="form-group row">
          
        <label for="img" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-5">
          <div class="form-control" style="overflow-x: hidden;">
          Order Serial Number : {{$order->order_sn}}
          </div>

          </div>



          <label for="img" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-5">
          <div class="form-control" style="overflow-x: hidden;">Product : {{$product->name}}({{$product->variety}},
          @if(($product->size/1000)<1) 
          {{$product->size}}ml
          @else 
          {{$product->size/1000}}L
          @endif)</div>

          </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name"></label>
              </div>
              <div class="form-control">Payment Option  :  @if($order->payment_method == 'momo') Mobile Money @else Cash @endif</div>
            </div>
          </div>

        </div>

        <div class="form-group row" @if($order->payment_method == 'cash')style="display: none;" @endif>
        <label for="img" class="col-sm-2 col-form-label">Account Name</label>
        <div class="col-sm-4">
        <div name="variety" id="variety" class="required form-control">
        Account Name : {{$order->momo_name}}
      </div>

        </div>

        <div class="col-sm-1">
        

        </div>


        <div class="col-sm-5">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="size"></label>
            </div>
            <div class="col-sm-2 form-control">
            Account Number : {{$order->momo_number}}
        </div>
          </div>
        </div>

      </div>

    <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-5">
            <div class="form-control">
            Delivery Method : {{$order->delivery_method}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price"></label>
              </div>
              <div class="form-control">Location : {{$order->location}}</div>
            </div>
          </div>

        </div>


        <div class="form-group row" style="margin-top: 15px;">
          <label for="stock_status" class="col-sm-2 col-form-label"></label>
          <div class="col-sm-5">
            <div class="form-control">
            Quantity : {{$order->quantity}}
            
            
            </div>
           </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="price"></label>
              </div>
              <div class="form-control">Total Cost(GH&#8373;) : {{$order->total}}</div>
            </div>
          </div>

        </div>
     

     </div>
     
      
      </div>
      

        
    </div>
──────────────────────────<br/>

