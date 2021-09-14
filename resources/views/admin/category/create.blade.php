@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{route('admin.category.store')}}"  enctype="multipart/form-data">
        @csrf

        @include('admin.category._form', ['category' => null])


    </form>

@endsection