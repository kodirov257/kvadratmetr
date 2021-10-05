@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="{{ route('admin.project.developers.sale-offices.store', $developer) }}" enctype="multipart/form-data">
        @csrf

        @include('admin.project.sale-offices._form', ['saleOffice' => null])
    </form>
@endsection
