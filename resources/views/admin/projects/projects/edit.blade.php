@extends('layouts.admin.page')

@section('content')
    {!! Form::open(['url' => route('admin.projects.update', $project), 'method' => 'POST']) !!}
        @csrf
        @method('PUT')

        <div class="col-md-10">
            <div class="form-group">
                {!! Form::label('developer_id', trans('adminlte.brand.name'), ['class' => 'col-form-label']); !!}
                {!! Form::select('developer_id', $developers, old('developer_id', $project ? $project->developer_id : null),
                    ['class'=>'form-control' . ($errors->has('developer_id') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                @if ($errors->has('developer_id'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('developer_id') }}</strong></span>
                @endif
            </div>
        </div>

        @include('partials.admin._nav')

        @include('admin.projects.projects._form')
    {!! Form::close() !!}
@endsection