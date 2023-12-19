@extends('layouts.hc')
  @include('components.nav.navbar2')
    

    <div class="container-fluid py-5">
    @if(count($members)>0 & !empty($members))
        <div class="container">
            @foreach($members as $member)
        <div class="card-body">
      
        
        <div class="form-group row ">
        <div class="col-sm-4">
        <h2 class="card-title text-primary" >{{$member->member_type}}会員</h2>
        <h5>
          &yen;{{$member->membership_cost}}/
          {{$member->membership_duration}}年間          
        </h5>
        </div>

        <div class="col-sm-8">
          <ol id="benefits">
            @foreach(\App\Models\MemberBenefits::where('member_id',$member->id)->get() as $benefit)
            <li style="margin-bottom: 10px; list-style:decimal">
                  {{$benefit->perks}}
                  
                      
          </li>
          @endforeach
            
          </ol>
        </div>
        

        


      </div>

      <hr>

     
      </div>
      @endforeach            
        </div>
        @else
        <div class="text-center mx-auto mb-5" style="max-width: 800px;">
    <p class="display-7">会員制情報なし</p>
</div>
        @endif
    </div>


   