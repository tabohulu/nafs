@extends('layouts.nafs')
@include('layouts.navigation_main')

<!-- Contact Start -->
<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
    <div class="cardProcessing modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header background-warning">
                <h5 class="modal-title ">Order</h5>
            </div>
            <div class="modal-body" style="display: flex;flex-direction:column;align-items:center;">
                <p>Processing...</p>
                <div id="loader2" class="cell preloader5 spinner-border"></div>
            </div>
        </div>

    </div>
</div>
<div class="container-fluid pt-5">
    <div class="container">
        <section class="font-1 py-5 contIn1000">
            <div class="container">
                <form id="product-form" action="/product/order" method="POST" onsubmit="return buy.ConfirmDelete()">
                    {{ csrf_field() }}
                    <div class="row cartContBox01">
                        <div class="col-lg-3 pull-lg-8">
                            <div class="flexslider" data-controlnav="thumbnails">
                                <ul class="slides">

                                    <li data-thumb="/img/products/{{$product->img}}">
                                        <img class="prod-pic" src="/img/products/{{$product->img}}">
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="col pl-lg-9 push-lg-4">
                        <input type="hidden" name="id" id="type" value="{{$product->id}}">
                            <input type="hidden" name="name" id="type" value="{{$product->name}}">
                            <input type="hidden" name="img" id="img" value="{{$product->img}}">
                            <h1 class="fs-3 prod-name">{{$product->name}}</h1>
                            
                            <div class="mt-3">
                                <span class="fs-2 prod_price">GH&#8373;{{$product->price}}</span>
                                <input type="hidden" id="prod_price" name="prod_price" class="prod_price" value="{{$product->price}}">

                            </div>
                            <div class="form-group row">
                                <div class="col-sm-8"></div>
                                <div class="col-sm-4"></div>
                            </div>
                            <hr class="color-9">
                            <p class="fw-600 mb-0 prod-details">Product Details:<span class="color-success " >{{$product->variety}}, @if($product->size/(1000)<1){{$product->size}}ml @else{{$product->size/(1000)}}L @endif</span></p>
                            <input type="hidden" id="variety" name="variety" class="" value="{{$product->variety}}">
                            <input type="hidden" id="size" name="size" class="" value="{{$product->size}}">
                            <!-- <h6 class="color-5 mb-3">SKU: A045-1041-00</h6> -->
                            @foreach($productdescriptions as $description)
                            <p>{{$description->content}}</p>
                            @endforeach
                            <div class="form-group row" id="user_details">
                            <p class="mb-0" style="color: red;">*Please enter your details. We will contact you once the order is completed</p>
                                <div class="col-sm-6">
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="momo_name">Customer Name</label>
                                        </div>
                                        <input type="text" class=" required form-control d-inline-block ml-2 center-item" name="customer_name" id="customer_name">

                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="momo_number">Contact Number</label>
                                        </div>
                                        <input type="tel" name="customer_number" id="customer_number" class="required digits form-control d-inline-block ml-2 center-item">


                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="name">Quantity</label>
                                        </div>
                                        <select id="cartSelect01" class="cartSelect01 form-control d-inline-block ml-2" style="min-width: 40px; height: auto;">

                                        </select>
                                        <input type="hidden" name="quantity" id="quantity" value="1">
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="name">Payment Options</label>
                                        </div>
                                        <div class="form-control d-inline-block ml-2 center-item">

                                            <label class="radio-inline"><input type="radio" name="payment_method" id="r1" value="cash" checked="true"> Cash</label>



                                            <label class="radio-inline ml-3"><input type="radio" name="payment_method" id="r2" value="momo" style="padding-left: 15px;"> Mobile Money</label>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div style="display: none;" class="form-group row" id="momo_details">
                            <p class="mb-0" style="color: red;">*Please enter the details of the mobile money account you will use for the transaction</p>
                                <label for="is_same"> Same as user details <input type="checkbox" name="is_same" id="is_same" checked></label>
                            <div class="col-sm-6">
                                    
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="momo_name">Account Name</label>
                                        </div>
                                        <input type="text" class=" required form-control d-inline-block ml-2 center-item" id="momo_name" name="momo_name">

                                    </div>
                                </div>

                                <div class="col-sm-5">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="momo_number">Number</label>
                                        </div>
                                        <input type="tel" id="momo_number" name="momo_number" class="required digits form-control d-inline-block ml-2 center-item">


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

                                            <label class="radio-inline"><input type="radio" name="delivery_method" id="d1" value="pickup" checked="true"> Pickup</label>



                                            <label class="radio-inline ml-3"><input type="radio" name="delivery_method" id="d2" value="other" style="padding-left: 15px;" > Other</label>

                                        </div>


                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="name">Total(GH&#8373;)</label>
                                        </div>
                                        <div id="total-cost" class="input-group-text form-control d-inline-block ml-2" style="min-width: 40px; height: auto;">

                                        </div>
                                        <input type="hidden" name="total" id="total" value="{{$product->price}}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                
                                    <p class="text-warning mb-0">Select location closest to you</p>
                                

                                <div class="col-sm-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="name">Location</label>
                                        </div>
                                        <div class="form-control d-inline-block ml-2 center-item">

                                            <label class="radio-inline"><input type="radio" name="location" id="l1" value="Kumasi" checked="true"> Kumasi</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="location" id="l2" value="Accra" style="padding-left: 15px;" > Accra</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="location" id="l3" value="Other" style="padding-left: 15px;" > Other</label>

                                        </div>


                                    </div>
                                </div>

                                <div class="col-sm-5">
                                <button id="reserve_btn" class="col-sm-8 btn btn-success center-block">Place Order</button>
                                </div>

                                

                                
                            </div>


                            <!-- <button id="reserve_btn" class="col-sm-4 btn btn-success center-block">Place Order</button> -->

                            {{--<button type="button" data-id="20" class="btn btn-danger order-btn hover">Place Order</button>--}}

                        </div>




                    </div>
                </form>
                    <hr>
                    <div class="row mb-2">
                <h4 class="col-sm-12 card-title color-warning">Reviews : {{$product->name}} (<span>{{$product->variety}}, @if($product->size/(1000)<1){{$product->size}}ml @else{{$product->size/(1000)}}L @endif</span>)</h4>
                {{--<div class="col-sm-4">
                    <form action="/review/create" method="GET">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button id="reserve_btn" class="col-sm-6 btn btn-warning center-block">Create Review</button>
                    </form>
                    
                </div>--}}
                </div>
                @if(count($reviews)==0 | empty($reviews))
			    <h2>No Reviews</h2>
                
			@else
                @foreach($reviews as $review)
                
                <div class="form-group row">

                <div class="col-sm-2"><p>{{$review->created_at}}</p>
                @for($i=0;$i<$review->rating;$i++)
                <span class="fa fa-star checked" style="color: orange;"></span>
                @endfor
                @for($i=0;$i<5- $review->rating;$i++)
                <span class="fa fa-star"></span>
                @endfor
            </div>
                <div class="col-sm-10">{{$review->review}}</div>
                

                </div>
                
                @endforeach
                
                @endif
      
            </div>
            <!--/.container-->
        </section>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>

<script>

$.extend($.validator.messages, {
        required: "Please Fill this field",
        number: "Please enter a valid number",
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
    
    let buy = {
        init: () => {
            let container = document.getElementsByClassName("contIn1000")[0];
            //populate options
            const options = [];
            let min_prod_amount = 1;
            // if (document.getElementById("type").value === "jerky") {
            //     min_prod_amount = 5;
            // }

            for (let i = min_prod_amount; i <= 30; i++) {
                options.push(`<option value="${i}">${i}</option>`);
            }

            //get item select elem
            let cart_selections = container.querySelectorAll(".cartSelect01");

            //populate select with options
            for (const cart_sel of cart_selections) {
                for (const option of options) {
                    cart_sel.innerHTML += option;
                }
            }
            //On click
            let total_cost = document.getElementById('total-cost')
            total_cost.innerText = parseInt(document.getElementById('prod_price').value)
            document.getElementById('total').value = document.getElementById('prod_price').value

            //on click payment method
            let payment_method = document.getElementsByName('payment_method');
            let momo_details = document.getElementById('momo_details');
            let is_same = document.getElementById('is_same');
            let momo_name = document.getElementById('momo_name');
            let momo_number = document.getElementById('momo_number');
            let customer_name = document.getElementById('customer_name');
            let customer_number = document.getElementById('customer_number');
            console.log(momo_details)
            for (let i =0; i< payment_method.length;i++) {
                const method = payment_method[i]
                console.log(method)
                method.onchange = (e) => {
                    console.log(e.target)

                    if (e.target.value == 'cash') {
                        momo_details.style.display="none"
                    } else {
                        momo_details.style.display="flex"
                        console.log(is_same.value)
                        if (is_same.checked){
                            momo_name.value     = customer_name.value ;
                            momo_number.value   = customer_number.value ;
                        }
                    }
                }
            }

            //on-click is same 
            is_same.onclick=(e)=>{
            if (e.target.checked){
                        momo_name.value     = customer_name.value ;
                        momo_number.value   = customer_number.value ;
                    }else{
                        momo_name.value     = '' ;
                        momo_number.value   = '' ;
                    }
            }

            //onchange customer name
            customer_name.onchange =(e)=>{
                if(is_same.checked){
                    momo_name.value = e.target.value;
                }
            }

            //onchange customer number
            customer_number.onchange =(e)=>{
                if(is_same.checked){
                    momo_number.value = e.target.value;
                }
            }





        },
        slide: function() {
            let slides = document.getElementsByClassName("slides")[0];
            let img = slides.querySelector("img");
            console.log(img.getAttribute("src"));
        },

        ConfirmDelete: () => {
        var x = confirm("Are you sure you want to place this order? ");
        if (x & formCheck()){
            let modal = document.getElementById("exampleModalLive");
        modal.classList.add("show");
        modal.style.display = "block";
        modal.arialModal = "true";
            return true;
        }else{
            return false;
        }
         
        
    }

    };

    document.addEventListener("DOMContentLoaded",()=>{
        buy.init();
    let cart_selections = document.getElementById('cartSelect01')
    let total_cost = document.getElementById('total-cost')
    cart_selections.onchange = (e) => {
        document.getElementById('quantity').value = parseInt(e.target.value)
        total_cost.innerText = parseInt(document.getElementById('prod_price').value) * parseInt(e.target.value)
        document.getElementById('total').value = total_cost.innerText;
    }
    })

    
    
    
    
</script>