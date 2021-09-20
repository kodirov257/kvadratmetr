@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.projects.characteristics.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    @csrf

    @include ('partials.admin.flash')
    @include('admin.projects.characteristics._form', ['characteristic' => null])
    {!! Form::close() !!}

@endsection