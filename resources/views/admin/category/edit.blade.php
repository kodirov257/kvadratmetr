@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.category.edit', $category) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.categories._form')
    </form>
@endsection