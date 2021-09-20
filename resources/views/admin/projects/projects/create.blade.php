@extends('layouts.admin.page')

@section('content')

    {!! Form::open(['url' => route('admin.projects.store'), 'method' => 'POST',  'enctype' => 'multipart/form-data']) !!}
        @csrf

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('developer_id', trans('adminlte.developer.name'), ['class' => 'col-form-label']); !!}
                {!! Form::select('developer_id', $developers, old('developer_id'),
                    ['class'=>'form-control' . ($errors->has('developer_id') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                @if ($errors->has('developer_id'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('developer_id') }}</strong></span>
                @endif
            </div>
        </div>

        @include('partials.admin._nav')
        @include ('partials.admin.flash')
        @include('admin.projects.projects._form', ['project' => null])
    {!! Form::close() !!}

@endsection