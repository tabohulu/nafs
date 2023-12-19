@extends('layouts.nafs')
@include('layouts.navigation_main')

<section class="pt-6 pb-4">
    <div class="container">
    <h1 class="fs-3 mb-3 fw-400 text-center" style="color:green">Review Successfully Received!<p style="color:red"></h1>
    <p class="text-center">Thank you for making the time. Page will be redirected to <a href="/">Home</a> 
    </p>   
        <h1 class="fs-3 mb-3 fw-400 text-center">Your {{$review->rating}} Star Review</h1>
    </div>
    <!--/.container-->
</section>
<div class="form-group row">
    
<div class="col-sm-2"></div>
    <div class="col-sm-8">
        
        <div class="input-group mb-3">
        <textarea name="review" id="review" cols="80" rows="5" disabled>

        {{$review->review}}
        </textarea>
            
           


        </div>
    </div>
    <div class="col-sm-2"></div>
    
</div>
<script type="text/javascript">
    document.addEventListener("DOMContentLoaded",()=>{
        setTimeout(()=>{
            window.location.href='/'
        }, 2000);
    })
        
         
      
    
</script>