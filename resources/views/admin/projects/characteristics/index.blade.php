@extends('layouts.admin.page')

@if (!config('adminlte.enabled_laravel_mix'))
    @php($javaScriptSectionName = 'js')
@else
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section('content')
    <p><a href="{{ route('admin.projects.characteristics.create') }}" class="btn btn-success">{{ trans('adminlte.characteristic.add') }}</a></p>

    <div class="card mb-4">
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-4">
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
            <th>{{ trans('adminlte.name') }}</th>
            <th>{{ trans('adminlte.type') }}</th>
            <th>{{ trans('adminlte.required') }}</th>
            <th></th>
        </tr>
        </thead>
        <tbody>

        @foreach ($characteristics as $characteristic)
            <tr>
                <td><a href="{{ route('admin.projects.characteristics.show', $characteristic) }}">{{ $characteristic->name }}</a></td>
                <td>
                    {{ $characteristic->variants ? 'Select' : $characteristic->typeName() }}
                </td>
                <td>{{ $characteristic->required ? trans('adminlte.yes') : trans('adminlte.no') }}</td>
                <td>
                    <div class="d-flex flex-row">
                        <form method="POST" action="{{ route('admin.projects.characteristics.first', $characteristic) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.projects.characteristics.up', $characteristic) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-up"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.projects.characteristics.down', $characteristic) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-down"></span></button>
                        </form>
                        <form method="POST" action="{{ route('admin.projects.characteristics.last', $characteristic) }}" class="mr-1">
                            @csrf
                            <button class="btn btn-sm btn-outline-primary"><span class="fa fa-angle-double-down"></span></button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    {{ $characteristics->links() }}
@endsection

@section($javaScriptSectionName)
    <script>
    </script>
@endsection
