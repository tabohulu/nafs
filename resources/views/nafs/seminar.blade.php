@extends('layouts.hc')
@include('components.nav.navbar2')


<div class="text-center mx-auto mb-5" style="max-width: 800px;">
    <h1 class="display-6 text-primary">
        セミナー一覧
    </h1>

</div>

@if(count($seminars)>0 & !empty($seminars))
@foreach($seminars as $seminar)
<div class="card-body">
    <h4 class="card-title color-warning">{{$seminar->name}}</h4>
    <hr>
    <img style="margin-bottom: 30px;" class="card-img-top" src="/img/seminars/{{$seminar->img}}" width="500px">
   
    <div class="form-group row">
        <div class="col-sm-12">

            <p name="description" class="form-contro" id="description" rows="3">
            {{$seminar->description}}
            </p>
        </div>

    </div>


</div>

@endforeach
@else
<div class="text-center mx-auto mb-5" style="max-width: 800px;">
    <p class="display-7">セミナー情報なし</p>
</div>
@endif