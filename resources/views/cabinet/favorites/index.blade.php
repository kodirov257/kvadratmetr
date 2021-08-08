@extends('layouts.app')

@section('content')
    @include('cabinet.favorites._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Updated</th>
            <th>Title</th>
            <th>Region</th>
            <th>Category</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($projects as $project)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->updated_at }}</td>
                <td><a href="{{ route('projects.show', $project) }}" target="_blank">{{ $project->title }}</a></td>
                <td>
                    @if ($project->region)
                        {{ $project->region->name }}
                    @endif
                </td>
                <td>{{ $project->category->name }}</td>
                <td>
                    <form method="POST" action="{{ route('cabinet.favorites.remove', $project) }}" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Remove</button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $projects->links() }}
@endsection