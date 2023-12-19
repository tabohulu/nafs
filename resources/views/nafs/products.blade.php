@extends('layouts.nafs')
@include('layouts.navigation_main')


<!-- Contact Start -->
<div class="container-fluid pt-5">
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            
            <div class="carousel-inner ">
                <div class="carousel-item active ">
                    <img style="max-height: 700px;" class="d-block w-100"  src="/img/gallery/{{$img_gallery[0]->img}}" alt="First slide">
                </div>
                
                @for($i=1;$i<count($img_gallery);$i++)

                <div class="carousel-item">
                    <img style="max-height: 700px;" class="d-block w-100" src="/img/gallery/{{$img_gallery[$i]->img}}" alt="Second slide">
                </div>

                @endfor
                <!-- <div class="carousel-item">
                    <img style="max-height: 700px;" class="d-block w-100" src="..." alt="Third slide">
                </div> -->
            </div>
            <a class="carousel-control-prev" role="button" data-slide="prev" onclick="plusSlides(-1)">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" role="button" data-slide="next" onclick="plusSlides(1)">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <h3 class="mt-3">Our Products</h3>
        <hr>
        @if(count($products)>0 & !empty($products))
        
        <div class="row form-group mt-3" style="margin-bottom: 20px;">
            @foreach($products as $prod)
            <a class="col-sm-4" href="/details/{{$prod->id}}" @if($prod->stock_status !='Available') style="pointer-events: none; cursor: default;" @endif>
            <div class=" align-items-center color-9 mb-3 py-3 mx-0">
            <div class="card" style="width: 18rem;">
  <img class="card-img-top" src="/img/products/{{$prod->img}}" alt="{{$prod->name}}" style="max-height: 350px;">
  <div class="card-body">
    <p class="card-title text-left">{{$prod->name}}</p>
    <p class="card-title text-left" style="color: gray;">{{$prod->variety}} : <span>@if($prod->size/(1000)<1){{$prod->size}}ml @else{{$prod->size/(1000)}}L @endif</span></p>
    <h5 class="card-text text-left">GH&#8373;{{$prod->price}}</h5>
    <p class="card-text text-left" @if($prod->stock_status == 'Available') style="color:green" @else style="color:red" @endif>{{$prod->stock_status}}</p>
  </div>
</div>
        </div>
            @endforeach
            </a>
        </div>
        
        @else
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
            <p class="display-7">Products Unavailable</p>
        </div>
        @endif



    </div>
</div>


<script>
    let slideIndex = 1;
        
    document.addEventListener("DOMContentLoaded",()=>{
        showSlides();
    })
    
	

// moveSlides(slideIndex);

// // Next/previous controls
// function plusSlides(n) {
//   moveSlides(slideIndex += n);
// }

// // Thumbnail image controls
// function currentSlide(n) {
//   moveSlides(slideIndex = n);
// }

// function moveSlides(n) {
//   let i;
//   let slides = document.getElementsByClassName("carousel-item");
//   let dots = document.getElementsByClassName("dot");
//   if (n > slides.length) {slideIndex = 1}
//   if (n < 1) {slideIndex = slides.length}
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   for (i = 0; i < dots.length; i++) {
//     dots[i].className = dots[i].className.replace(" active", "");
//   }
//   slides[slideIndex-1].style.display = "block";
//   dots[slideIndex-1].className += " active";
// }

// let slideIndex = 0;
// showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("carousel-item");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>









<!-- About End -->