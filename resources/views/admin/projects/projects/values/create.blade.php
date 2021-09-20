@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.projects.values.store', $project) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.projects.projects.values._form', ['value' => null, 'characteristic' => null])
    </form>
@endsection
