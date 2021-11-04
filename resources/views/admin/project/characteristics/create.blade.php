@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.characteristics.store') }}" enctype="multipart/form-data">
        @csrf

        @include ('partials.admin.flash')
        @include('admin.project.characteristics._form', ['characteristic' => null])
    </form>
@endsection