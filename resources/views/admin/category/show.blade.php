@extends('layouts.admin.page')

@php($parent = $category->parent)

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.category.edit', $category) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        <form method="POST" action="{{ route('admin.category.destroy', $category) }}" class="mr-1">
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
                    <table class="table{{-- table-bordered--}} table-striped">
                        <tbody>
                        <tr><th>ID</th><td>{{ $category->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $category->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $category->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $category->name_en }}</td></tr>
                        <tr><th>Slug</th><td>{{ $category->slug }}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.parent') }}</th><td>
                                @if($parent)
                                    <a href="{{ route('admin.categories.show', $parent) }}">{{ $parent->name }}</a>
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection