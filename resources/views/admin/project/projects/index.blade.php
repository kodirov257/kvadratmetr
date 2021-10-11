@extends('layouts.admin.page')

@section('content')
    <div class="card mb-3">
{{--        <div class="card-header">Filter</div>--}}
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="id" class="col-form-label">ID</label>
                            <input id="id" class="form-control" name="id" value="{{ request('id') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{trans('adminlte.title')}}</label>
                            <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="user" class="col-form-label">{{trans('adminlte.user.name')}}</label>
                            <input id="user" class="form-control" name="user" value="{{ request('user') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="region" class="col-form-label">{{trans('adminlte.region')}}</label>
                            <input id="region" class="form-control" name="region" value="{{ request('region') }}">
                        </div>
                    </div>
{{--                    <div class="col-sm-1">--}}
{{--                        <div class="form-group">--}}
{{--                            <label for="category" class="col-form-label">Category</label>--}}
{{--                            <input id="category" class="form-control" name="category" value="{{ request('category') }}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="status" class="col-form-label">{{trans('adminlte.status')}}</label>
                            <select id="status" class="form-control" name="status">
                                <option value=""></option>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('status') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">{{trans('adminlte.search')}}</button>
                            <a href="?" class="btn btn-outline-secondary">Clear</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{trans('adminlte.updated_at')}}</th>
            <th>{{trans('adminlte.title')}}</th>
            <th>{{trans('adminlte.developer.name')}}</th>
{{--            <th>Region</th>--}}
{{--            <th>Category</th>--}}
            <th>{{trans('adminlte.status')}}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($projects as $project)
            @php($developer = $project->developer)
            <tr>
                <td>{{ $project->id }}</td>
                <td>{{ $project->updated_at }}</td>
                <td><a href="{{ route('admin.project.developers.projects.show', [$developer, $project]) }}" target="_blank">{{ $project->name }}</a></td>
                <td><a href="{{ route('admin.project.users.developers.show', [$developer->owner, $developer]) }}">{{ $project->developer->id }} - {{ $project->developer->name }}</a></td>
{{--                <td>--}}
{{--                    @if ($project->region)--}}
{{--                        {{ $project->region->id }} - {{ $project->region->name }}--}}
{{--                    @endif--}}
{{--                </td>--}}
{{--                <td>{{ $project->category->id }} - {{ $project->category->name }}</td>--}}
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