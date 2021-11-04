@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.characteristics.update', $characteristic) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.project.characteristics._form')
    </form>
@endsection