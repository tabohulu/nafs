@extends('layouts.nafs')
@include('layouts.navigation_main')

<!-- Contact Start -->
<div id="exampleModalLive" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLiveLabel" style="display: none;" aria-hidden="true">
    <div class="cardProcessing modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header background-warning">
                <h5 class="modal-title ">Review for {{$product->name}}, <span class="color-success " >{{$product->variety}}, @if($product->size/(1000)<1){{$product->size}}ml @else{{$product->size/(1000)}}L @endif</span> </h5>
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
            <form id="review_form" action="/review/save" method="POST" onsubmit="return review.ConfirmSubmit()">
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
                            <h1 class="fs-3 prod-name">Review for {{$product->name}}, <span class="color-success " >{{$product->variety}}, @if($product->size/(1000)<1){{$product->size}}ml @else{{$product->size/(1000)}}L @endif</span></h1>
                            
                            
                            
                            <hr class="color-9">
                            <input type="hidden" id="variety" name="variety" class="" value="{{$product->variety}}">
                            <input type="hidden" id="size" name="size" class="" value="{{$product->size}}">
                            <input type="hidden" id="order_sn" name="order_sn" class="" value="{{$order_sn}}">
                            <!-- <h6 class="color-5 mb-3">SKU: A045-1041-00</h6> -->
                           
                            {{--<div class="form-group row">
                            <p class="text-warning mb-0">Order serial number is needed to create a review</p>
                                <div class="col-sm-8">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="order_sn">Order Serial Number</label>
                                        </div>
                                        
                                        <input type="text" name="order_sn" id="order_sn" value="">
                                        <div class="input-group-append">
                                        <div id="confirm" class="btn btn-success">
                                            Confirm
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>--}}

                            <div id="review_div">

                            <div class="form-group row">

                                <div class="col-sm-7">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="name">Rating</label>
                                        </div>
                                        <div class="form-control d-inline-block ml-2 center-item">

                                            <label class="radio-inline"><input type="radio" name="rating" id="d1" value="1"> 1</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="rating" id="d2" value="2"> 2</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="rating" id="d3" value="3"> 3</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="rating" id="d4" value="4"> 4</label>

                                            <label class="radio-inline ml-3"><input type="radio" name="rating" id="d5" value="5" checked="true"> 5</label>



                                        </div>


                                    </div>
                                </div>

                                

                                
                            </div>

                            <div class="form-group row">
                            <p class="text-warning mb-0">Enter your review here(1024 characters max)</p>
                            <div class="col-sm-7">
                            
                            <textarea name="userreview" id="userreview" cols="60" rows="10" class="required" maxlength="255"></textarea>
                            </div>

                            </div>

                            

                            <button id="reserve_btn" class="col-sm-8 btn btn-success center-block">Create Review</button>

                            </div>

                        </div>


                    </div>
            </form>
                
                    
                    
                
      
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
        digits: "Numeric Values Only!",
        maxlength: $.validator.format("enter input with length less than {0}。")
    });

    let form = $("#review_form");
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

    let orderSnConfirm = document.getElementById('confirm')
        let reviewDiv = document.getElementById('review_div')
    
   let review ={
    init:()=>{
        let orderSnConfirm = document.getElementById('confirm')
        let reviewDiv = document.getElementById('review_div')
        

    },
    ConfirmSubmit: () => {
        console.log(document.getElementById('userreview').value)
        if(document.getElementById('userreview').value.trim() || document.getElementById('userreview').value.length<1024){

        
        var x = confirm("Reviews made cannot be deleted. \nAre you sure you want to add this review? ") ;
        if (x){
            let modal = document.getElementById("exampleModalLive");
        modal.classList.add("show");
        modal.style.display = "block";
        modal.arialModal = "true";
            return true;
        }else{
            return false;
        }
    }else{
             alert('Nothing written in review or written review over 1024 characters.')
             return false
        }
         
        
    },
    confirmOrderSn:()=>{
        const data = new FormData(document.getElementById("review_form"));
        var object = {};
        data.forEach(function (value, key) {
            object[key] = value;
        });
        var json_data = JSON.stringify(object);
        console.log(json_data);
        fetch("/review/confirmOrderSn", {
            // fetch("https://linkpt.cardservice.co.jp/cgi-bin/token/token.cgi", {
            method: "POST",
            body: data,
            // mode: "cors",
            headers: {
                // Accept: "application/json",
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                //     // "Access-Control-Allow-Origin": "*",
            },
        })
            .then((resp) => {
                console.log(resp);
                return resp.json();
            })
            .then((response) => {
                console.log(response)
                
                if(response[0]===null ){
                    alert('order serial number not found')

                }
                else{
                    if (response[1]===null) {
                        const { shipped} = response[0];
                        console.log(shipped);
                        if(shipped===0){
                            alert('Your order has not been shipped yet. \nYour review will be displayed once it has been shipped')
                        }
                        reviewDiv.style.display='block'
                    } else {
                        alert('Review already exists.')
                        
                    }

                   
                    
                    
                }
                
            })
            .catch((error) => {
                console.log(error);
            });
    }
   }

    document.addEventListener("DOMContentLoaded",()=>{
        // orderSnConfirm.onclick=review.confirmOrderSn
    })

    
    
    
    
</script>