@extends('layouts.app')

@section('content')
    @include('admin.projects.categories._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.projects.categories.characteristics.edit', [$category, $characteristic]) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.projects.categories.characteristics.destroy', [$category, $characteristic]) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Delete</button>
        </form>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>ID</th><td>{{ $category->id }}</td>
        </tr>
        <tr>
            <th>Name</th><td>{{ $category->name }}</td>
        </tr>
        <tr>
            <th>Slug</th><td>{{ $category->slug }}</td>
        </tr>
        <tbody>
        </tbody>
    </table>
@endsection