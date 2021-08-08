@extends('layouts.app')

@section('content')
    @include('cabinet.projects._nav')

    <p>Choose category:</p>

    @include('cabinet.projects.create._categories', ['categories' => $categories])

@endsection