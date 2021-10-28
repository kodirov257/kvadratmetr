@extends('layouts.developer.app')

@section('content')


    <div class="main-content">
        <div class="row home-row">
            <div class="col-8">
                    <form method="POST" action="{{route('cabinet.developer.store')}}" enctype="multipart/form-data">
                        {{--                        {{ csrf_field() }}--}}

                        @csrf
                        @include('developer._developer-body')
                    </form>
            </div>
            <div class="col-4">
                @include('partials.components.dashboard._sidebar_insights')
                @include('partials.components.dashboard._sidebar_plan')
            </div>
        </div>
    </div>
@endsection
