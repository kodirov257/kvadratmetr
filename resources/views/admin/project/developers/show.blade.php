@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.project.users.developers.edit', [$user, $developer]) }}" class="btn btn-primary mr-1">@lang('adminlte.edit')</a>
        <a href="{{ route('admin.project.developers.projects.create', $developer) }}" class="btn btn-primary mr-1">Add project</a>

        <form method="POST" action="{{ route('admin.project.users.developers.destroy', [$user, $developer]) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">@lang('adminlte.delete')</button>
        </form>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr><th>ID</th><td>{{ $developer->id }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Uz</th><td>{{ $developer->name_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} Ru</th><td>{{ $developer->name_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.name') }} En</th><td>{{ $developer->name_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} Uz</th><td>{!! htmlspecialchars_decode($developer->about_uz) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} Ru</th><td>{!! htmlspecialchars_decode($developer->about_ru) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.about') }} En</th><td>{!! htmlspecialchars_decode($developer->about_en) !!}</td></tr>
                        <tr><th>{{ trans('adminlte.status') }}</th><td>{!! $developer->getStatusLabel() !!}</td></tr>
                        <tbody>
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
                        <tr><th>{{ trans('adminlte.address') }} Uz</th><td>{{ $developer->address_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} Ru</th><td>{{ $developer->address_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.address') }} En</th><td>{{ $developer->address_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} Uz</th><td>{{ $developer->landmark_uz }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} Ru</th><td>{{ $developer->landmark_ru }}</td></tr>
                        <tr><th>{{ trans('adminlte.landmark') }} En</th><td>{{ $developer->landmark_en }}</td></tr>
                        <tr><th>{{ trans('adminlte.longitude') }}</th><td>{{ $developer->lng }}</td></tr>
                        <tr><th>{{ trans('adminlte.latitude') }}</th><td>{{ $developer->ltd }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">{{ trans('adminlte.contact') }}</div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>Phone</th>
                            <td>
                                @if($developer->main_number)
                                    +{{ $developer->main_number }}
                                @endif
                            </td>
                        </tr>
                        <tr><th>Call center number</th><td>{{ $developer->call_center }}</td></tr>
                        <tr><th>Website</th><td>{{ $developer->website }}</td></tr>
                        <tr><th>Email</th><td>{{ $developer->email }}</td></tr>
                        <tr><th>Facebook</th><td>{{ $developer->facebook }}</td></tr>
                        <tr><th>Instagram</th><td>{{ $developer->instagram }}</td></tr>
                        <tr><th>Tik-tok</th><td>{{ $developer->tik_tok }}</td></tr>
                        <tr><th>Telegram</th><td>{{ $developer->telegram }}</td></tr>
                        <tr><th>Youtube</th><td>{{ $developer->youtube }}</td></tr>
                        <tr><th>Twitter</th><td>{{ $developer->twitter }}</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection