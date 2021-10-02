@extends('layouts.admin.page')

@php($user = Auth::user())

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.developers.projects.edit', [$developer, $project]) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>
        @if ($project->isOnModeration() && Gate::allows('alter-projects-status'))
            <form method="POST" action="{{ route('admin.projects.moderate', $project) }}" class="mr-1">
                @csrf
                <button class="btn btn-primary" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.publish')</button>
            </form>
        @elseif (($project->isDraft() || $project->isClosed()) && Gate::allows('alter-projects-status'))
            <form method="POST" action="{{ route('admin.projects.on-moderation', $project) }}" class="mr-1">
                @csrf
                <button class="btn btn-success" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.send_to_moderation')</button>
            </form>
        @elseif($project->isActive() && Gate::allows('manage-projects', $project))
            <form method="POST" action="{{ route('admin.projects.close', $project) }}" class="mr-1">
                @csrf
                <button class="btn btn-danger" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.close')</button>
            </form>
            @can('alter-projects-status')
                <form method="POST" action="{{ route('admin.projects.draft', $project) }}" class="mr-1">
                    @csrf
                    <button class="btn btn-default" onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">@lang('adminlte.draft')</button>
                </form>
            @endcan
        @endif
        <a href="{{ route('admin.projects.photos', $project) }}" class="btn btn-secondary mr-1">{{ trans('adminlte.project.add_photos') }}</a>
        <a href="{{ route('admin.projects.values.add', $project) }}" class="btn btn-warning mr-1">{{ trans('adminlte.value.add') }}</a>
        <a href="{{ route('admin.project.projects.facilities', $project) }}" class="btn btn-warning mr-1">{{ trans('adminlte.facilities.add') }}</a>
        <a href="{{ route('admin.project.projects.plans.create', $project) }}" class="btn btn-warning mr-1">{{ trans('adminlte.plan.add') }}</a>
        <form method="POST" action="{{ route('admin.developers.projects.destroy', [$developer, $project]) }}" class="mr-1">
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
                        <tr><th>ID</th><td>{{ $project->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $project->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $project->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $project->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} Uz</th><td>{!! htmlspecialchars_decode($project->about_uz) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} Ru</th><td>{!! htmlspecialchars_decode($project->about_ru) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} En</th><td>{!! htmlspecialchars_decode($project->about_en) !!}</td></tr>
                        <tr><th>Slug</th><td>{{ $project->slug }}</td></tr>
{{--                        <tr>--}}
{{--                            <th>{{ trans('adminlte.project.category') }}</th>--}}
{{--                            <td><a href="{{ route('admin.categories.show', $project->category) }}">{{ $project->category->name }}</a></td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.address') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.address') }} Uz</th><td>{{ $project->address_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} Ru</th><td>{{ $project->address_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} En</th><td>{{ $project->address_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} Uz</th><td>{{ $project->landmark_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} Ru</th><td>{{ $project->landmark_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} En</th><td>{{ $project->landmark_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.longitude') }}</th><td>{{ $project->lng }}</td></tr>
                        <tr><th>{{ trans('adminlte.latitude') }}</th><td>{{ $project->ltd }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.additional') }}</h3></div>
                <div class="card-body">
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr><th>{{ trans('adminlte.price') }}</th><td>{{ $project->price }}</td></tr>
                        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! \App\Helpers\ProjectHelper::getStatusLabel($project->status) !!}</td></tr>
                        <tr>
                            <th>{{ trans('adminlte.reject_reason') }}</th>
                            <td>
                                @if($project->status === \App\Entity\Projects\Project\Project::STATUS_DRAFT && $project->reject_reason)
                                    {{ $project->reject_reason }}
                                @endif
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-gray card-outline">
                <div class="card-header"><h3 class="card-title">{{ trans('adminlte.others') }}</h3></div>
                <div class="card-body">
                    @php($developer = $project->developer)
                    <table class="table {{--table-bordered--}} table-striped projects">
                        <tbody>
                        <tr>
                            <th>{{ trans('adminlte.developer') }}</th>
                            <td>
                                <a href="{{ route('admin.users.developers.show', [$developer->owner, $developer]) }}">
                                    {{ $project->developer->name }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.owner') }}</th>
                            <td><a href="{{ route('admin.users.show', $developer->owner) }}">{{ $project->developer->owner->name }}</a></td>
                        </tr>
                        <tr><th>{{ trans('adminlte.created_at') }}</th><td>{{ $project->created_at }}</td></tr>
                        <tr><th>{{ trans('adminlte.updated_at') }}</th><td>{{ $project->updated_at }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="card" id="photos">
        <div class="card-header border">{{ trans('adminlte.photo.plural') }}</div>
        <div class="card-body">
            <div class="row">
                @foreach($project->photos as $photo)
                    <div class="col-md-2 col-xs-3" style="text-align: center">
                        <div class="btn-group">
                            <a href="{{ route('admin.projects.move-photo-up', ['project' => $project, 'photo' => $photo]) }}" id="{{ $project->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </a>
                            {!! Form::open(['url' => route('admin.projects.remove-photo', ['project' => $project, 'photo' => $photo])]) !!}
                            @csrf
                            @method('DELETE')
                            <button type="submit" id="{{ $project->id }}" photo_id="{{ $photo->id }}" class="btn btn-default" style="border-radius: 0; margin-left: -1px;"
                                    onclick="return confirm('{{ trans('adminlte.delete_confirmation_message') }}')">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            {!! Form::close() !!}
                            <a href="{{ route('admin.projects.move-photo-down', ['project' => $project, 'photo' => $photo]) }}" id="{{ $project->id }}" class="btn btn-default">
                                <span class="glyphicon glyphicon-arrow-right"></span>
                            </a>
                        </div>
                        <div style="margin-top: 10px;">
                            <a href="{{ $photo->fileOriginal }}" target="_blank" class="img-thumbnail"><img src="{{ $photo->fileThumbnail }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card" id="values">
        <div class="card-header card-gray with-border">{{ trans('adminlte.value.name') }}</div>
        <div class="card-body">
            <p><a href="{{ route('admin.projects.values.add', $project) }}" class="btn btn-success">{{ trans('adminlte.value.add') }}</a></p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>{{ trans('adminlte.characteristic.name') }}</th>
                    <th>{{ trans('adminlte.value.name') }}</th>
                    <th>{{ trans('adminlte.main') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($project->values as $value)
                    @php($characteristic = $value->characteristic)
                    <tr>
                        <td><a href="{{ route('admin.projects.characteristics.show', ['project' => $project, 'characteristic' => $characteristic]) }}">{{ $characteristic->name }}</a></td>
                        <td>
                            @if($characteristic->is_range)
                                {{ $value->value_from }} - {{ $value->value_to }}
                            @else
                                {{ $value->value }}
                            @endif
                        </td>
                        <td>{{ $value->main ? trans('adminlte.yes') : trans('adminlte.no') }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.projects.values.first', ['project' => $project, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.projects.values.up', ['project' => $project, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.projects.values.down', ['project' => $project, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.projects.values.last', ['project' => $project, 'characteristic' => $characteristic]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center td-min-width">
                            <a href="{!! route('admin.projects.values.show', ['project' => $project, 'characteristic' => $characteristic]) !!}" data-popup="tooltip" title="Show"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="values">
        <div class="card-header card-gray with-border">{{ trans('adminlte.plan.name') }}</div>
        <div class="card-body">
            <p><a href="{{ route('admin.project.projects.plans.create', $project) }}" class="btn btn-success">{{ trans('adminlte.plan.add') }}</a></p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Image</th>
                    <th>{{ trans('adminlte.area') }}</th>
                    <th>{{ trans('adminlte.area_unit') }}</th>
                    <th>{{ trans('adminlte.rooms') }}</th>
                    <th>{{ trans('adminlte.bathroom') }}</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($project->plans as $plan)
                    <tr>
                        <td>
                            @if ($plan->image)
                                <a href="{{ $plan->imageOriginal }}" target="_blank"><img src="{{ $plan->imageThumbnail }}"></a>
                            @endif
                        </td>
                        <td>{{ $plan->area }}</td>
                        <td>{{ $plan->unitName() }}</td>
                        <td>{{ $plan->rooms }}</td>
                        <td>{{ $plan->bathrroom }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.project.projects.plans.first', ['project' => $project, 'plan' => $plan]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.plans.up', ['project' => $project, 'plan' => $plan]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.plans.down', ['project' => $project, 'plan' => $plan]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.plans.last', ['project' => $project, 'plan' => $plan]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                        <td class="text-center td-min-width">
                            <a href="{!! route('admin.project.projects.plans.show', ['project' => $project, 'plan' => $plan]) !!}" data-popup="tooltip" title="Show"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>

    <div class="card" id="values">
        <div class="card-header card-gray with-border">{{ trans('adminlte.facility.name') }}</div>
        <div class="card-body">
            <p><a href="{{ route('admin.project.projects.facilities', $project) }}" class="btn btn-success">{{ trans('adminlte.facility.add') }}</a></p>
            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Icon</th>
                    <th>{{ trans('adminlte.name') }}</th>
                    <th>{{ trans('adminlte.comment') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>

                @foreach ($project->facilities as $facility)
                    <tr>
                        <td>
                            @if ($facility->icon)
                                <a href="{{ $facility->iconOriginal }}" target="_blank"><img src="{{ $facility->iconThumbnail }}"></a>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.project.facilities.show', $facility) }}">{{ $facility->name }}</a></td>
                        <td>{{ $facility->comment }}</td>
                        <td>
                            <div class="d-flex flex-row">
                                <form method="POST" action="{{ route('admin.project.projects.facilities.first', ['project' => $project, 'facility' => $facility]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.facilities.up', ['project' => $project, 'facility' => $facility]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.facilities.down', ['project' => $project, 'facility' => $facility]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                                </form>
                                <form method="POST" action="{{ route('admin.project.projects.facilities.last', ['project' => $project, 'facility' => $facility]) }}" class="mr-1">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
@endsection
