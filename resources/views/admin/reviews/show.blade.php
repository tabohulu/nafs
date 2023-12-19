@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{ url('/dashboard/reviews/'.$review->id.'/edit') }}" method="GET">
{{ csrf_field() }}
    <div class="container">
      <div class="row card-body">
      <h4 class="card-title color-warning" >Review  rated {{$review->rating}}/5  stars for {{$product->name}}, <span class="color-success " >{{$product->variety}}, @if($product->size/(1000)<1){{$product->size}}ml @else{{$product->size/(1000)}}L @endif</span> by {{$review->order_sn}} </h4>
      <a href="/dashboard/reviews">To Reviews</a>  
      <hr>
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
        <div id="review_div" >



<div class="form-group row">
    

    <div class="col-sm-12">
        
        <div class="input-group mb-3">
        <textarea name="review" id="review" cols="80" rows="5" disabled>

        {{$review->review}}
        </textarea>
            
           


        </div>
    </div>

    

    

    
</div>


</div>
      </div>
     
      
      </div>
      

        
    </div>

      
</form>


       
      

    

