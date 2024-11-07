@extends('layouts.nafs')
@include('layouts.navigation_main')

<!-- About Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100 rounded" src={{asset('img/'.\App\Models\HomeSettings::where('key','img')->first()->value)}} style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                </div>
                @foreach($summaries as $summary)
                    <p>{{$summary->value}}</p>
                @endforeach

                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Mission</h5>
                </div>
                @foreach($missions as $mission)
                    <p>{{$mission->value}}</p>
                @endforeach

                <div class="mb-4">
                    <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Vision</h5>
                </div>
                @foreach($visions as $vision)
                    <p>{{$vision->value}}</p>
                @endforeach
                
            </div>
        </div>
    </div>
</div>
<!-- About End -->
