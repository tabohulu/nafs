@extends('layouts.hc')
@include('components.nav.navbar2')

<div class="container">
      <div class="card-body">
      <div class="gx-5 row justify-content-center">
            <div class="col-lg-5 justify-content-center">
                <img src="/img/services/{{$service->img}}" width="450px" height="300px"/>
            </div>

            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
                        {{$service->name}}
                    </h5>
                </div>
                <p>{{$service->time_type}}：{{$service->time}}分</p>
                <p>価格：@if($service->sets>0){{$service->sets}}回セット　@endif￥{{$service->price}} ({{$service->tax_type}}){{$service->other}}</p>
                @foreach($servicedescriptions as $description)
                @if($description->istitle=='true')
                  <h5>{{$description->content}}</h5>
                @else
                <p>{{$description->content}}</p>
                @endif
                @endforeach


            </div>

        </div>
      </div>
      <div class="row form-group">
      <div class="col-sm-5"></div>
        <div class="col-sm-5"><a href="/services">全健康サービスへ</a></div>
        
      </div>
</div>

      
     