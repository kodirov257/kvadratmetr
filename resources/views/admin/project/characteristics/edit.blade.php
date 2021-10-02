@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.project.characteristics.update', $characteristic), 'method' => 'POST']) !!}
        @csrf
        @method('PUT')

        @include('admin.project.characteristics._form')
    {!! Form::close() !!}
@endsection