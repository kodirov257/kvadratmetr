@extends('layouts.app')

@section('content')
    @include('cabinet.projects._nav')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Updated</th>
            <th>Title</th>
            <th>Region</th>
            <th>Category</th>
            <th>Status</th>
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
                    @if ($project->isDraft())
                        <span class="badge badge-secondary">Draft</span>
                    @elseif ($project->isOnModeration())
                        <span class="badge badge-primary">Moderation</span>
                    @elseif ($project->isActive())
                        <span class="badge badge-primary">Active</span>
                    @elseif ($project->isClosed())
                        <span class="badge badge-secondary">Closed</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $projects->links() }}
@endsection