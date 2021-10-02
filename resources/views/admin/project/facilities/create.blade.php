@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.facilities.store') }}" enctype="multipart/form-data">
        @csrf

        @include('admin.project.facilities._form', ['facility' => null])
    </form>
@endsection
