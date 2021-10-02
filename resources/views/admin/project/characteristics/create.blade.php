@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.project.characteristics.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
    @csrf

    @include ('partials.admin.flash')
    @include('admin.project.characteristics._form', ['characteristic' => null])
    {!! Form::close() !!}

@endsection