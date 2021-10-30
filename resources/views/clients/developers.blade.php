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
                    @foreach($projects as $project)
                        @include('clients.layout.small-project-card-sidebar', ['project'=>$project])
                    @endforeach
                </div>
                <div class="col-9">
                    @foreach($developers as $developer)
                    @include('clients.layout.big-developer-card')
                    @endforeach
{{--                    TODO: pagination need to connect--}}
                    @include('clients.layout.pagination')
                </div>
            </div>
        </div>
    </section>


@endsection