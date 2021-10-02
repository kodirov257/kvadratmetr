@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.projects.values.update', ['project' => $project, 'characteristic' => $characteristic]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.project.projects.values._form')
    </form>
@endsection
