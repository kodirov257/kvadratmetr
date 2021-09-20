@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.projects.values.update', ['project' => $project, 'characteristic' => $characteristic]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects.projects.values._form')
    </form>
@endsection
