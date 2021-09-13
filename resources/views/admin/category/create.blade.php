@extends('layouts.admin.page')

@section('content')
    <form action="{{route('admin.category.create')}}"  enctype="multipart/form-data"method="POST">
        @csrf

        @include('admin.category._form', ['category' => null])


    </form>

@endsection