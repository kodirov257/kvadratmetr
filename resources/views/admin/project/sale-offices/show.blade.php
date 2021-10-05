@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.project.developers.sale-offices.edit', [$developer, $saleOffice]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.project.developers.sale-offices.destroy', [$developer, $saleOffice]) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">{{ trans('adminlte.delete') }}</button>
        </form>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>ID</th><td>{{ $saleOffice->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} Uz</th><td>{{ $saleOffice->address_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} Ru</th><td>{{ $saleOffice->address_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} En</th><td>{{ $saleOffice->address_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.latitude') }}</th><td>{{ $saleOffice->ltd }}</td></tr>
                        <tr><th>{{ trans('adminlte.longitude') }}</th><td>{{ $saleOffice->lng }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
