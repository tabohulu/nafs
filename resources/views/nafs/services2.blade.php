@extends('layouts.hc')
@include('components.nav.navbar2')

<div class="text-center mx-auto mb-5" style="max-width: 1000px;">
    <h1 class="display-6 text-primary">
        価格表
    </h1>
    <div class="row gx-1">
        <div class="col-lg-2">効果： </div>
        <div class="col-lg-10" style="text-align:left">
            <p>筋肉と筋膜を刺激し、酸素注入とマイナスイオンの注入の有酸素運動によって脂肪燃焼を促進します。
            身体を温めて、新陳代謝を促進し、痩せやすい体を作ります。重い疲れが飛んで一層軽くなった体で爽やかな毎日を迎えます。
            </p>
            <!-- <p>身体を温めて、新陳代謝を促進し、痩せやすい体を作ります。</p>
            <p>重い疲れが飛んで一層軽くなった体で爽やかな毎日を迎えます。</p> -->
        </div>

    </div>


</div>
<div class="container-fluid">
    <div class="container">
        @foreach($menus as $menu)
        <div class="text-center mx-auto mb-5" style="max-width: 100%;">
            <h1 class="display-6 text-primary">
                {{$menu->menu}}
            </h1>
        </div>
        @foreach(\App\Models\Service::where('menu',$menu->menu)->orderBy('position','asc')->get() as $service)
        <div class="gx-5 row justify-content-center">
            <div class="col-lg-5 justify-content-center">
                <img src="/img/services/{{$service->img}}" width="450px" style="aspect-ratio: 16/9;"/>
            </div>

            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">
                        {{$service->name}}
                    </h5>
                </div>
                <p>{{$service->time_type}}：{{$service->time}}分</p>
                <p>価格：@if($service->sets>0){{$service->sets}}回セット　@endif￥{{$service->price}} ({{$service->tax_type}}){{$service->other}}</p>
                @foreach(\App\Models\ServiceDescription::where('service_id',$service->id)->get() as $description)
                @if($description->istitle=='true')
                  <h5>{{$description->content}}</h5>
                @else
                <p>{{$description->content}}</p>
                @endif
                @endforeach


            </div>

        </div>
        <hr>
        @endforeach
        @endforeach
        
        

</div>

</div>
