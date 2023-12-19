@extends('layouts.nafs_admin')
@include('layouts.navigation')

<form action="/dashboard/settings/change" method="POST" id="service-form" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="container">
    <div class="card-body">
      <h4 class="card-title color-warning">Homepage Settings</h4>
      <hr>
      <h5 class="card-title text-primary color-warning">Contact Information</h5>
      <div class="form-group row">
      <div class="col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">Location</label>
            </div>
            <input type="text" name="location"  value="{{\App\Models\HomeSettings::where('key','location')->first()->value}}" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">Mobile Number</label>
            </div>
            <input type="text" name="tel"  value="{{\App\Models\HomeSettings::where('key','tel')->first()->value}}" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">e-mail</label>
            </div>
            <input type="text" name="email"  value="{{\App\Models\HomeSettings::where('key','email')->first()->value}}" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <input type="hidden" name="is_facebook" value="false">
              <label class="input-group-text" for="is_facebook"><input type="checkbox" name="is_facebook" id="is_facebook" value="true"
              @if(\App\Models\HomeSettings::where('key','is_facebook')->first()->value == 'true') checked @endif> Facebook </label>
            </div>
            <input type="text" name="facebook"  value="@if(!empty(\App\Models\HomeSettings::where('key','facebook')->first())) {{\App\Models\HomeSettings::where('key','facebook')->first()->value}} @endif" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            <input type="hidden" name="is_instagram" value="false">
              <label class="input-group-text" for="is_instagram"><input type="checkbox" name="is_instagram" id="is_instagram" value="true"
              @if(\App\Models\HomeSettings::where('key','is_instagram')->first()->value == 'true') checked @endif> Instagram </label>
            </div>
            <input type="text" name="instagram"  value="@if(!empty(\App\Models\HomeSettings::where('key','instagram')->first())) {{\App\Models\HomeSettings::where('key','instagram')->first()->value}} @endif" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-3">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
            <input type="hidden" name="is_X" value="false">
              <label class="input-group-text" for="is_X"><input type="checkbox" name="is_X" id="is_X" value="true"
              @if(\App\Models\HomeSettings::where('key','is_X')->first()->value == 'true') checked @endif> X </label>
            </div>
            <input type="text" name="X"  value="@if(!empty(\App\Models\HomeSettings::where('key','X')->first())) {{\App\Models\HomeSettings::where('key','X')->first()->value}} @endif" class="required form-control">
        
          </div>
        </div>


      </div>
<hr>
      {{--<h5 class="card-title text-primary color-warning">労働時間</h5>
      <div class="form-group row">
      <div class="col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">平日</label>
            </div>
            <input type="text" name="weekdays"  value="{{\App\Models\HomeSettings::where('key','weekdays')->first()->value}}" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-6">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="name">土日</label>
            </div>
            <input type="text" name="weekends"  value="{{\App\Models\HomeSettings::where('key','weekends')->first()->value}}" class="required form-control">
        
          </div>
        </div>

        
      </div>
      <hr>--}}

      <h5 class="card-title text-primary color-warning">Company Information</h5>
      {{--<div class="form-group row" style="margin-top: 15px;">
          <label for="img" class="col-sm-2 col-form-label">会社理念</label>
          <div class="col-sm-10">
          <textarea rows="5" name="mission" id="mission" class="form-control required">{{\App\Models\HomeSettings::where('key','mission')->first()->value}}</textarea> 
            </div>

      </div>--}}

    <div class="form-group row" style="margin-top: 15px;">
          <label for="img" class="col-sm-2 col-form-label">About Us Image</label>
          <div class="col-sm-6">
            <label class="btn btn-success" for="img">Select Image</label>
          <input type="text" id ="old_img" name ="old_img" readonly value="{{\App\Models\HomeSettings::where('key','img')->first()->value}}" />
          <input type="file" id ="img" name="img" accept="image/png, image/gif, image/jpeg"  style="display: none;"/>
          </div>
          

          {{--<div class="col-sm-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="max-width">最大幅</label>
            </div>
            <input type="text" name="max-width"  value="" class="required form-control">
        
          </div>
        </div>

        <div class="col-sm-2">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="max-height">最大高さ</label>
            </div>
            <input type="text" name="max-height"  value="" class="required form-control">
        
          </div>
        </div>--}}

    </div>

    {{--<div class="form-group row" style="margin-top: 15px;">
          <label for="img" class="col-sm-2 col-form-label">一番目上（バナー）の写真</label>
          <div class="col-sm-6">
            <label class="btn btn-success" for="img2">画像選択</label>
          <input type="text" id ="old_img2" name ="old_img2" readonly value="{{\App\Models\HomeSettings::where('key','img2')->first()->value}}" />
          <input type="file" id ="img2" name="img2" accept="image/png, image/gif, image/jpeg"  style="display: none;"/>
          </div>
          

          

    </div>--}}

    <div class="form-group row">
       
       <div class="col-sm-2 col-form-label">
       <div >About Us Details</div>
       <div class="btn btn-warning add" id="add">
       Add
       </div>
       </div>
       <div class="col-sm-10" >
         <ul id="description">
          @foreach($summaries as $summary)
         <li class="mb-2" id="item-0">
           <div class="form-group row">
           
             <div class="col-sm-12">
             <div class="input-group mb-3"> 
             <textarea rows="5" class="required form-control" id="description-{{$summary->id}}" type="text" name="old_summary[]">{{$summary->value}}</textarea>
             <a href="/dashboard/settings/summarydelete/{{$summary->id}}" class="input-group-prepend btn btn-danger" 
             onclick="event.preventDefault();
             if(confirm('Do you want to delete this?')){
              location.href = event.target.href;
             }">
                Delete
              </a>
             <input type="hidden" value="{{$summary->id}}" name="old_summary_id[]">
             </div>
             </div>
                      
           </div>            
         </li>
         @endforeach
         </ul>
         
         </div>

     </div>
     <hr>
     {{--<div class="btn btn-warning add">
       Add
       </div>--}}
     
       <div class="form-group row">
       
       <div class="col-sm-2 col-form-label">
       <div >Mission Details</div>
       <div class="btn btn-warning add-mission" id="add-mission">
       Add
       </div>
       </div>
       <div class="col-sm-10" >
         <ul id="description-mission">
          @foreach($missions as $mission)
         <li class="mb-2" id="item-0">
           <div class="form-group row">
           
             <div class="col-sm-12">
             <div class="input-group mb-3"> 
             <textarea rows="5" class="required form-control" id="description-{{$mission->id}}" type="text" name="old_summary_mission[]">{{$mission->value}}</textarea>
             <a href="/dashboard/settings/summarydelete/{{$mission->id}}" class="input-group-prepend btn btn-danger" 
             onclick="event.preventDefault();
             if(confirm('Do you want to delete this?')){
              location.href = event.target.href;
             }">
                Delete
              </a>
             <input type="hidden" value="{{$mission->id}}" name="old_summary_mission_id[]">
             </div>
             </div>
                      
           </div>            
         </li>
         @endforeach
         </ul>
         
         </div>

     </div>
     <hr>

     <div class="form-group row">
       
       <div class="col-sm-2 col-form-label">
       <div >Vision Details</div>
       <div class="btn btn-warning add-vision" id="add-vision">
       Add
       </div>
       </div>
       <div class="col-sm-10" >
         <ul id="description-vision">
          @foreach($visions as $vision)
         <li class="mb-2" id="item-0">
           <div class="form-group row">
           
             <div class="col-sm-12">
             <div class="input-group mb-3"> 
             <textarea rows="5" class="required form-control" id="description-{{$vision->id}}" type="text" name="old_summary_vision[]">{{$vision->value}}</textarea>
             <a href="/dashboard/settings/summarydelete/{{$vision->id}}" class="input-group-prepend btn btn-danger" 
             onclick="event.preventDefault();
             if(confirm('Do you want to delete this?')){
              location.href = event.target.href;
             }">
                Delete
              </a>
             <input type="hidden" value="{{$vision->id}}" name="old_summary_vision_id[]">
             </div>
             </div>
                      
           </div>            
         </li>
         @endforeach
         </ul>
         
         </div>

     </div>


    </div>
    <button type="submit" class=" col-sm-2 btn btn-success center-block" id="reserve_btn">
        Update
      </button>
  </div>
  
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.11/jquery-ui.min.js"></script>
<script src="/js/jquery.form.min.js"></script>
<script src="/js/jquery.validate.min.js"></script>

<script>
  function addLi(ul,summary){
    let noLists = ul.getElementsByTagName('li').length+1;
    ul.insertAdjacentHTML('beforeend',
      returnLi(noLists,summary))
      //add ondel listener
      let del = document.getElementById(`${noLists}-${summary}`);
      del.onclick=(e)=>{
        document.getElementById(`item-${e.target.id}`).remove();
      }
      
      
  }
  function returnLi(noLists,summary){

    return `
      <li class="mb-2" id="item-${noLists}-${summary}">
           <div class="form-group row">
           
             <div class="col-sm-12">
             <div class="input-group mb-3"> 
             <textarea rows="5" class="required form-control" id="description-${noLists}" type="text" name="${summary}[]"></textarea>
             <div id="${noLists}-${summary}" class="input-group-prepend btn btn-danger">
                Delete
              </div>
             </div>
             </div>
                      
           </div>            
         </li>

      
      `

  }
  $.extend($.validator.messages, {
        required: "This field is required。",
        number: "Enter a valid value。",
        digits: "Enter only valid numbers。",
        maxlength: $.validator.format("enter input with length less than {0}。")
    });

    let form = $("#service-form");
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

        // function checkonchecked(elem){
        //   let id = elem.id.split('-')[1];
        //  document.getElementById(`title-${id}`).value= elem.checked;
        //  console.log(document.getElementById(`title-${id}`).value);
        // }

  document.addEventListener('DOMContentLoaded', function() {
    let sub_btn = document.getElementById('reserve_btn');
            sub_btn.onclick=(e)=>{
                e.preventDefault()
                if(formCheck()){
                    document.getElementById('service-form').submit();
                }
            }
    console.log(document.getElementById('img'))

    document.getElementById('img').onclick=(e)=>{
    console.log('here')
    document.getElementById('img').value=null;
  }
  
  document.getElementById('img').onchange=(e)=>{
    console.log(e.target.value.split('/'))
    document.getElementById('old_img').value=e.target.value.split('\\')[2];
  }

  //banner image
  // document.getElementById('img2').onclick=(e)=>{
  //   console.log('here')
  //   document.getElementById('img2').value=null;
  // }
  
  // document.getElementById('img2').onchange=(e)=>{
  //   console.log(e.target.value.split('/'))
  //   document.getElementById('old_img2').value=e.target.value.split('\\')[2];
  // }

  let inputs=[];
    let add = document.getElementsByClassName('add');
    let ul = document.getElementById('description')
    let noLists = ul.getElementsByTagName('li').length;

    let add_time = document.getElementById('add_times');
    let times_div = document.getElementById('times_div');

    //mission
    let addMission = document.getElementsByClassName('add-mission');
    let ulMission = document.getElementById('description-mission')
    let noListsMission = ulMission.getElementsByTagName('li').length;

    //vision
    let addVision = document.getElementsByClassName('add-vision');
    let ulVision = document.getElementById('description-vision')
    let noListsVision = ulVision.getElementsByTagName('li').length;

    


    //about us
    for(let i=0;i<add.length;i++){
    add[i].onclick=()=>{

      addLi(ul,'summary')
      

      
    }
  }

    //Company mission
    for(let i=0;i<addMission.length;i++){
    addMission[i].onclick=()=>{
      addLi(ulMission,'summary_mission')
      
    }
  }

  //Company vision
  for(let i=0;i<addVision.length;i++){
    addVision[i].onclick=()=>{
      addLi(ulVision,'summary_vision')
      
    }
  }
    
})
  
</script>
