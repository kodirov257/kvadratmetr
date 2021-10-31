@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')

    <section class="developer-page">
        <div class="container">
            @include('clients.layout.breadcrumb')
{{--            @dd($developer)--}}
            <h1 class="page-title text-align-left">{{$developer->name}}</h1>
        </div>
    </section>

    @include('clients.components.about-developer')

    <section class="develop-projects">
        <div class="container">
            <h2 class="develop-projects-title">{{$developer->name}}</h2>
            <div class="latest-slider">
                @foreach($developer->projects as $project)
                    @include('clients.layout.project-card-main')
                @endforeach

            </div>
        </div>
    </section>

    <section class="sales-ofice">
        <div class="container">
            <h2 class="sales-ofice-title">Sales Offices</h2>
            <div id="map" class="map"></div>
        </div>
    </section>
    <script src="{{asset('assets/user-front/assets/leaflet/leaflet.js')}}"></script>
@endsection