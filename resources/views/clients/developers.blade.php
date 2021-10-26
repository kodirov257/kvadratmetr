@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')
    <section class="developers-page">
        <div class="container">
            @include('clients.layout.breadcrumb')
            <h1 class="page-title text-align-left">Developers</h1>
            <div class="row dispresp">
                <div class="col-3">
                    <!-- AD -->
                    @include('clients.layout.place-for-ads-sidebar')
                    <!-- END AD -->
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                    @include('clients.layout.small-project-card-sidebar')
                </div>
                <div class="col-9">
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.big-developer-card')
                    @include('clients.layout.pagination')
                </div>
            </div>
        </div>
    </section>


@endsection