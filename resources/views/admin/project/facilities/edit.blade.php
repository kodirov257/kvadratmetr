@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.facilities.update', $facility) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.project.facilities._form')
    </form>
@endsection
