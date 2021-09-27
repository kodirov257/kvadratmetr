@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.projects.facilities.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.projects.facilities._form', ['facility' => null])
    </form>
@endsection
