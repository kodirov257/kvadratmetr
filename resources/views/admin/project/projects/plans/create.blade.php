@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.project.projects.plans.store', $project), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    @csrf

    @include ('partials.admin.flash')
    @include('admin.project.projects.plans._form', ['plan' => null])
    {!! Form::close() !!}

@endsection