@extends('layouts.admin.page')

@section('content')
    <p><a href="{{ route('admin.users.create') }}" class="btn btn-success">{{ trans('adminlte.user.add') }}</a></p>

    <div class="card mb-3">
{{--        <div class="card-header">Filter</div>--}}
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="name" class="col-form-label">{{ trans('adminlte.user.name') }}</label>
                            <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="email" class="col-form-label">{{ trans('adminlte.email') }}</label>
                            <input id="email" class="form-control" name="email" value="{{ request('email') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="phone" class="col-form-label">{{ trans('adminlte.phone') }}</label>
                            <input id="phone" class="form-control" name="phone" value="{{ request('phone') }}">
                        </div>
                    </div>
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="status" class="col-form-label">{{ trans('adminlte.status') }}</label>
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
                            <label for="role" class="col-form-label">{{ trans('adminlte.user.role') }}</label>
                            <select id="role" class="form-control" name="role">
                                <option value=""></option>
                                @foreach ($roles as $value => $label)
                                    <option value="{{ $value }}"{{ $value === request('role') ? ' selected' : '' }}>{{ $label }}</option>
                                @endforeach;
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.user.role') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>{{ trans('adminlte.user.name') }}</th>
            <th>{{ trans('adminlte.email') }}</th>
            <th>{{ trans('adminlte.phone') }}</th>
            <th>{{ trans('adminlte.status') }}</th>
            <th>{{ trans('adminlte.user.role') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('admin.users.show', $user) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email }}</td>
                <td>
                    @if($user->phone)
                        +{{ $user->phone }}
                    @endif
                </td>
                <td>
                    @if ($user->isWait())
                        <span class="badge badge-secondary">{{ trans('adminlte.user.waiting') }}</span>
                    @endif
                    @if ($user->isActive())
                        <span class="badge badge-primary">{{ trans('adminlte.user.active') }}</span>
                    @endif
                </td>
                <td>
                    @if ($user->isAdmin())
                        <span class="badge badge-danger">Admin</span>
                    @else
                        <span class="badge badge-secondary">User</span>
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $users->links() }}
@endsection