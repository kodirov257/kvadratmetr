@extends('layouts.app')

@section('content')
    @include('cabinet.projects._nav')

    @if ($region)
        <p>
            <a href="{{ route('cabinet.projects.create.project', [$category, $region]) }}" class="btn btn-success">Add Project for {{ $region->name }}</a>
        </p>
    @else
        <p>
            <a href="{{ route('cabinet.projects.create.project', [$category]) }}" class="btn btn-success">Add Project for all regions</a>
        </p>
    @endif

    <p>Or choose nested region:</p>

    <ul>
        @foreach ($regions as $current)
            <li>
                <a href="{{ route('cabinet.projects.create.region', [$category, $current]) }}">{{ $current->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection