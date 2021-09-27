@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.developers.projects.store', $developer), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        @include('partials.admin._nav')
        @include ('partials.admin.flash')
        @include('admin.projects.projects._form', ['project' => null])
    {!! Form::close() !!}

@endsection