@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.project.developers.projects.update', [$developer, $project]), 'method' => 'POST']) !!}
        @csrf
        @method('PUT')

        @include('partials.admin._nav')

        @include('admin.project.projects._form')
    {!! Form::close() !!}
@endsection