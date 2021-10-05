@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.projects.plans.update', [$project, $plan]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.project.projects.plans._form')
    </form>
@endsection