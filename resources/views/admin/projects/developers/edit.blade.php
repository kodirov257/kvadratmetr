@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.users.developers.update', [$user, $developer]) }}">
        @csrf
        @method('PUT')

        @include('partials.admin._nav')
        @include ('partials.admin.flash')

        @include('admin.projects.developers._form', ['user' => $user, 'developer' => $developer])
    </form>
@endsection