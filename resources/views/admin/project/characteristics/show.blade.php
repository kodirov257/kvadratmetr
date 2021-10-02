@extends('layouts.admin.page')

@php($user = Auth::user())

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.project.characteristics.edit', $characteristic) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        <form method="POST" action="{{ route('admin.project.characteristics.destroy', $characteristic) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $characteristic->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $characteristic->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $characteristic->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $characteristic->name_en }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.type') }}</th><td>{{ $characteristic->typeName() }}</td></tr>
                        <tr><th>{{ trans('adminlte.required') }}</th><td>{{ $characteristic->required ? trans('adminlte.yes') : trans('adminlte.no') }}</td></tr>
                        <tr><th>{{ trans('adminlte.is_range') }}</th><td>{{ $characteristic->required ? trans('adminlte.yes') : trans('adminlte.no') }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.other') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.created_by') }}</th><td>{{ $characteristic->createdBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_by') }}</th><td>{{ $characteristic->updatedBy->name }}</td></tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $characteristic->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $characteristic->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
