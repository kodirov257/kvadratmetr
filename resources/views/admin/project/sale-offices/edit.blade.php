@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.developers.sale-offices.update', [$developer, $saleOffice]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        @include('admin.project.sale-offices._form')
    </form>
@endsection
