@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{route('admin.categories.store')}}"  enctype="multipart/form-data">
        @csrf

        @include('admin.categories._form', ['category' => null])


    </form>

@endsection