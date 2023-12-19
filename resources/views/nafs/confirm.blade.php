@extends('layouts.nafs')
@include('layouts.navigation_main')

<section class="pt-6 pb-4">
    <div class="container">
    <h1 class="fs-3 mb-3 fw-400 text-center" style="color:green">Order Complete!<p style="color:red"></h1>
    <p class="text-warning">If you provided an active mobile number, we will contact you
    for the necessary details of the pickup location, or if you selected
    "other" for the delivery method. 
    </p>
       <div class="form-group row">
       <h2 class="col-sm-4 fs-2 mb-3 fw-400 text-right">Order Date:{{$date}}</h2>
       
        <h2 class="col-sm-7 fs-2 mb-3 fw-400 text-right text-warning">Order Serial Number:{{$order_sn}}</h2>
       </div> 
    

        <h1 class="fs-3 mb-3 fw-400 text-center">Your Order</h1>
    </div>
    <!--/.container-->
</section>
<div class="row">


    <div class="col-lg-3 pull-lg-8">
        <div class="flexslider" data-controlnav="thumbnails">
            <ul class="slides">

                <li data-thumb="/img/products/{{$img}}">
                    <img class="prod-pic" src="/img/products/{{$img}}">
                </li>

            </ul>
        </div>
    </div>

    <div class="col pl-lg-7 push-lg-4">


        <h1 class="fs-3 prod-name">{{$name}}</h1>

        <p class="fw-600 mb-0 prod-details">Product Details:<span class="color-success " >{{$variety}}, @if($size/(1000)<1){{$size}}ml @else{{$size/(1000)}}L @endif</span></p>
        <!-- <div class="badge badge-warning">#4 Best Seller</div> -->
        <div class="mt-3">
            <span class="fs-2 prod_price">GH&#8373;{{$prod_price}}</span>


        </div>
        <hr class="color-9">

        <!-- <h6 class="color-5 mb-3">SKU: A045-1041-00</h6> -->

        <div class="form-group row" id="customer_details">
            <div class="col-sm-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="customer_name">Customer Name</label>
                    </div>
                    <div class=" required form-control d-inline-block ml-2 center-item" name="customer_name">
                        {{$customer_name}}
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="customer_number">Number</label>
                    </div>
                    <div class=" required form-control d-inline-block ml-2 center-item" name="customer_number">
                        {{$customer_number}}
                    </div>


                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-2">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">Quantity</label>
                    </div>
                    <div id="cartSelect01" class="cartSelect01 form-control d-inline-block ml-2" style="min-width: 40px; height: auto;">
                        {{$quantity}}
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">Payment Options</label>
                    </div>
                    <div class="form-control d-inline-block ml-2 center-item">
                        {{$payment_method=='cash'?'Cash':'Mobile Money'}}

                    </div>


                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">Location</label>
                    </div>
                    <div class="form-control d-inline-block ml-2 center-item">
                    {{$location}}
                        

                    </div>


                </div>
            </div>
        </div>

        <div @if($payment_method=='cash' ) style="display: none;" @endif class="form-group row" id="momo_details">
            <div class="col-sm-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="momo_name">Account Name</label>
                    </div>
                    <div class=" required form-control d-inline-block ml-2 center-item" name="momo_name">
                        {{$momo_name}}
                    </div>

                </div>
            </div>

            <div class="col-sm-4">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="momo_number">Number</label>
                    </div>
                    <div class=" required form-control d-inline-block ml-2 center-item" name="momo_number">
                        {{$momo_number}}
                    </div>


                </div>
            </div>
        </div>


        <div class="form-group row">

            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">Delivery Method</label>
                    </div>
                    <div class="form-control d-inline-block ml-2 center-item">

                        <div class="d-inline-block ml-2 center-item">
                            {{$delivery_method}}

                        </div>
                    </div>


                </div>
            </div>

            <div class="col-sm-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="name">Total(GH&#8373;)</label>
                    </div>
                    <div id="total-cost" class="input-group-text form-control d-inline-block ml-2" style="min-width: 40px; height: auto;">
                        {{$total}}
                    </div>

                </div>
            </div>
        </div>
        
    <a href="/">Continue Shopping</a>



    </div>

    

</div>
<script type="text/javascript">
    // $(document).ready(function() {
    //     // final_admin.ConfirmCreate();
    // })
</script>