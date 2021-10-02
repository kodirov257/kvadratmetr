@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.project.developers.projects.store', $developer), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        @include('partials.admin._nav')
        @include ('partials.admin.flash')
        @include('admin.project.projects._form', ['project' => null])
    {!! Form::close() !!}

@endsection