@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.users.developers.store', $user) }}">
        @csrf

        @include('partials.admin._nav')
        @include ('partials.admin.flash')

        @include('admin.projects.developers._form', ['user' => $user, 'developer' => null])
    </form>
@endsection