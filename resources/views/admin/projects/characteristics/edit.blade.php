@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.projects.characteristics.update', $characteristic), 'method' => 'POST']) !!}
        @csrf
        @method('PUT')

        @include('admin.projects.characteristics._form')
    {!! Form::close() !!}
@endsection