@extends('layouts.admin.page')

@section('content')
    <div class="d-flex flex-row mb-3">
        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-1">{{ trans('adminlte.edit') }}</a>

        @if ($user->isWait())
            <form method="POST" action="{{ route('admin.users.verify', $user) }}" class="mr-1">
                @csrf
                <button class="btn btn-success">{{ trans('adminlte.user.verify') }}</button>
            </form>
        @endif

        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="mr-1">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">{{ trans('adminlte.delete') }}</button>
        </form>

        <a href="{{ route('admin.project.users.developers.create', $user) }}" class="btn btn-warning mr-1">{{ trans('adminlte.developer.create') }}</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <th>ID</th><td>{{ $user->id }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.name') }}</th><td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.email') }}</th><td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.phone') }}</th>
                            <td>
                                @if($user->phone)
                                    +{{ $user->phone }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.status') }}</th>
                            <td>
                                @if ($user->isWait())
                                    <span class="badge badge-secondary">{{ trans('adminlte.user.waiting') }}</span>
                                @endif
                                @if ($user->isActive())
                                    <span class="badge badge-primary">{{ trans('adminlte.user.active') }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>{{ trans('adminlte.user.role') }}</th>
                            <td>
                                @if ($user->isAdmin())
                                    <span class="badge badge-danger">Admin</span>
                                @else
                                    <span class="badge badge-secondary">User</span>
                                @endif
                            </td>
                        </tr>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection