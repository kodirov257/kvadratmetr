@extends('layouts.admin.page')

@php($user = Auth::user())

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.project.projects.plans.edit', [$project, $plan]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        <form method="POST" action="{{ route('admin.project.projects.plans.destroy', [$project, $plan]) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $plan->id }}</td></tr>
                        <tr>
                            <th>Project</th>
                            <td>
                                <a href="{{ route('admin.project.developers.projects.show', [$project->developer, $project]) }}">
                                    {{ $project->name }}
                                </a>
                            </td>
                        </tr>
                        <tr><th>{{ trans('adminlte.plan.area') }}</th><td>{{ $plan->area }}</td></tr>
                        <tr><th>{{ trans('adminlte.plan.area_unit') }}</th><td>{{ $plan->unitName() }}</td></tr>
                        <tr><th>{{ trans('adminlte.rooms') }}</th><td>{{ $plan->rooms }}</td></tr>
                        <tr><th>{{ trans('adminlte.bathroom') }}</th><td>{{ $plan->bathroom }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.image') }}</h3></div>
                <div class="card-body">
                    @if ($plan->image)
                        <a href="{{ $plan->imageOriginal }}" target="_blank"><img src="{{ $plan->imageThumbnail }}"></a>
                    @endif
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
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $plan->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $plan->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
