@extends('layouts.nafs_admin')
@include('layouts.navigation')
<form action="{{url('/dashboard/gallery/'.$gallery->id)}}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
{{method_field('PUT')}}
    <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning" >Products</h4>
        <hr>
        <div class="form-group row">
          <label for="img" class="col-sm-2 col-form-label">Image</label>
          <div class="col-sm-5">
            <label class="btn btn-success" for="img">Select</label>
          <input type="text" id ="old_img" name ="old_img" readonly value="{{$gallery->img}}" />
          <input type="file" id ="img" name="img" accept="image/png, image/gif, image/jpeg"  style="display: none;"/>
          </div>
          
          

          <div class="col-sm-5">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="name">Product Name</label>
              </div>
              <input type="text" name="name" id="name" class="form-control" value="{{$gallery->name}}">
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
    console.log(document.getElementById('img'))

    document.getElementById('img').onclick=(e)=>{
    console.log('here')
    document.getElementById('img').value=null;
  }
  
  document.getElementById('img').onchange=(e)=>{
    console.log(e.target.value.split('/'))
    document.getElementById('old_img').value=e.target.value.split('\\')[2];
  }

  let inputs=[];
    let add = document.getElementById('add');
    let ul = document.getElementById('description')
    let noLists = ul.getElementsByTagName('li').length;
    
    add.onclick=()=>{
      let lis = ul.getElementsByTagName('li');
      inputs=[];
    for(let i=0;i<lis.length;i++){
      const ip =lis[i].getElementsByClassName('row')[0].getElementsByClassName('col-sm-11')[0].querySelector('input');
      inputs.push(
        {id:ip.id,
          value:ip.value
      })
    }

      ul.insertAdjacentHTML('beforeend',
      `
      <li style="margin-bottom: 20px;" id="item-${noLists}">
            <div class="form-group row">
              <div class="col-sm-11">
              <input class="form-control" id="perks-${noLists}" type="text" name="description[]">
              </div>
              <div class="col-sm-1 btn btn-danger del" id="${noLists}">
              Delete
              </div>            
            </div>            
          </li>
      `)
      //add ondel listener
      let del = document.getElementById(`${noLists}`);
      del.onclick=(e)=>{
        document.getElementById(`item-${e.target.id}`).remove();
      }
      noLists+=1;

      
    }
})
  
</script>
       
      

    

