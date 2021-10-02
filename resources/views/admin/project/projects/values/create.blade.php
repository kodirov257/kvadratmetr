@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.projects.values.store', $project) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.project.projects.values._form', ['value' => null, 'characteristic' => null])
    </form>
@endsection
