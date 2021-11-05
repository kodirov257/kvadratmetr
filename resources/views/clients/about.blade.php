@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')

    <section class="about-us-page">
        <div class="container">
            @include('clients.layout.breadcrumb')
            <div class="title-flex">
                <h1 class="page-title text-align-left">About us</h1>
                <a href="#" class="print-button"><i class="icon-printer"></i>Print Contact info</a>
            </div>
            <div class="row">
                <div class="col-8">
                    @include('clients.components.about-us')
                </div>
                <div class="col-4">
                    @include('clients.components.about-us-contact-info')
                    {{--                    TODO: map--}}
                    @include('clients.layout.map')
                </div>
            </div>
            @include('clients.components.blog')

        </div>
    </section>

@endsection