@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.projects.facilities.update', $facility) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.projects.facilities._form')
    </form>
@endsection
