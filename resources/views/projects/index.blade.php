@extends('layouts.app')

@section('search')
    @include('layouts.partials.search', ['category' => $category, 'route' => '?'])
@endsection

@section('content')
    @if ($categories)
        <div class="card card-default mb-3">
            <div class="card-header">
                @if ($category)
                    Categories of {{ $category->name }}
                @else
                    Categories
                @endif
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach (array_chunk($categories, 3) as $chunk)
                        <div class="col-md-3">
                            <ul class="list-unstyled">
                                @foreach ($chunk as $current)
                                    <li>
                                        <a href="{{ route('projects.index', array_merge(['projects_path' => projects_path($region, $current)], request()->all())) }}">{{ $current->name }}</a>
                                        ({{ $categoriesCounts[$current->id] ?? 0 }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if ($regions)
        <div class="card card-default mb-3">
            <div class="card-header">
                @if ($region)
                    Regions of {{ $region->name }}
                @else
                    Regions
                @endif
            </div>
            <div class="card-body pb-0" style="color: #aaa">
                <div class="row">
                    @foreach (array_chunk($regions, 3) as $chunk)
                        <div class="col-md-3">
                            <ul class="list-unstyled">
                                @foreach ($chunk as $current)
                                    <li>
                                        <a href="{{ route('projects.index', array_merge(['projects_path' => projects_path($current, $category)], request()->all())) }}">{{ $current->name }}</a>
                                        ({{ $regionsCounts[$current->id] ?? 0 }})
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md-9">

            <div class="projects-list">
                @foreach ($projects as $project)
                    <div class="project">
                        <div class="row">
                            <div class="col-md-3">
                                <div style="height: 180px; background: #f6f6f6; border: 1px solid #ddd"></div>
                            </div>
                            <div class="col-md-9">
                                <span class="float-right">{{ $project->price }}</span>
                                <div class="h4" style="margin-top: 0"><a href="{{ route('projects.show', $project) }}">{{ $project->title }}</a></div>
                                <p>Region: <a href="">{{ $project->region ? $project->region->name : 'All' }}</a></p>
                                <p>Category: <a href="">{{ $project->category->name }}</a></p>
                                <p>Date: {{ $project->created_at }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $projects->links() }}
        </div>
        <div class="col-md-3">
            <div
                class="banner mb-3"
                data-url="{{ route('banner.get') }}"
                data-format="240x400"
                data-category="{{ $category ? $category->id : '' }}"
                data-region="{{ $region ? $region->id : '' }}"
            ></div>
        </div>
    </div>

@endsection