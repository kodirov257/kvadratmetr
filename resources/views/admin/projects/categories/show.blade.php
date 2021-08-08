@extends('layouts.app')

@section('content')
    @include('admin.projects.categories._nav')

    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.projects.categories.edit', $category) }}" class="btn btn-primary mr-1">Edit</a>
        <form method="POST" action="{{ route('admin.projects.categories.destroy', $category) }}" class="mr-1">
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

    <p><a href="{{ route('admin.projects.categories.characteristics.create', $category) }}" class="btn btn-success">Add Characteristic</a></p>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Sort</th>
            <th>Name</th>
            <th>Slug</th>
            <th>Required</th>
        </tr>
        </thead>
        <tbody>

        <tr><th colspan="4">Parent characteristics</th></tr>

        @forelse ($parentCharacteristics as $characteristic)
            <tr>
                <td>{{ $characteristic->sort }}</td>
                <td>{{ $characteristic->name }}</td>
                <td>{{ $characteristic->type }}</td>
                <td>{{ $characteristic->required ? 'Yes' : '' }}</td>
            </tr>
        @empty
            <tr><td colspan="4">None</td></tr>
        @endforelse

        <tr><th colspan="4">Own characteristics</th></tr>

        @forelse ($characteristics as $characteristic)
            <tr>
                <td>{{ $characteristic->sort }}</td>
                <td>
                    <a href="{{ route('admin.projects.categories.characteristics.show', [$category, $characteristic]) }}">{{ $characteristic->name }}</a>
                </td>
                <td>{{ $characteristic->type }}</td>
                <td>{{ $characteristic->required ? 'Yes' : '' }}</td>
            </tr>
        @empty
            <tr><td colspan="4">None</td></tr>
        @endforelse

        </tbody>
    </table>
@endsection