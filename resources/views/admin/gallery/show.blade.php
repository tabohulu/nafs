@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{ url('/dashboard/gallery/'.$gallery->id.'/edit') }}" method="GET">
{{ csrf_field() }}
    <div class="container">
      <div class="row card-body">
      <h4 class="card-title color-warning" >Gallery</h4>
      <a href="/dashboard/gallery">To Gallery</a>
        <hr>
        <div class="col-lg-3 pull-lg-8">
        <img style="margin-bottom: 30px;" class=" card-img-top" src="/img/gallery/{{$gallery->img}}">
        </div>

        <div class="col pl-lg-9 push-lg-4">
        <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-5">
          <div class="form-control" style="overflow-x: hidden;">{{$gallery->img}}</div>

          </div>
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Product Name</label>
              </div>
              <div class="form-control">{{$gallery->name}}</div>
            </div>
          </div>

        </div>

        
     <div class="form-group row">
     <button type="submit" class="col-sm-4 btn btn-warning center-block">
        Edit
      </button>

      <div class="col-sm-1"></div>

      <form action="{{ url('/dashboard/gallery/'.$gallery->id) }}" method="POST">
									{{ csrf_field() }}
                                    {{method_field('DELETE')}}
									 	<button type="submit" class="col-sm-4 btn btn-danger">
											<i class="glyphicon glyphicon-file"></i>Delete
									 </button>
								 </form>
     </div>

     </div>
     
      
      </div>
      

        
    </div>

      
</form>


       
      

    

