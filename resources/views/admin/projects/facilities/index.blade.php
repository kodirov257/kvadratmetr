@extends('layouts.admin.page')

@section('content')
    <p><a href="{{ route('admin.projects.facilities.create') }}" class="btn btn-success">{{ trans('adminlte.facilities.add') }}</a></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            {!! Form::text('name', request('name'), ['class'=>'form-control', 'placeholder' => trans('adminlte.name')]) !!}
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">{{ trans('adminlte.search') }}</button>
                            <a href="?" class="btn btn-outline-secondary">{{ trans('adminlte.clear') }}</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Icon</th>
            <th>{{ trans('adminlte.name') }}</th>
            <th>{{ trans('adminlte.comment') }}</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($facilities as $facility)
            <tr>
                <td>
                    @if ($facility->icon)
                        <a href="{{ $facility->iconOriginal }}" target="_blank"><img src="{{ $facility->iconThumbnail }}"></a>
                    @endif
                </td>
                <td><a href="{{ route('admin.projects.facilities.show', $facility) }}">{{ $facility->name }}</a></td>
                <td>{{ $facility->comment }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $facilities->links() }}
@endsection
