@extends('layouts.admin.page')

@section('content')
    <form method="POST" action="?" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::label('facility_id', trans('adminlte.facility.name'), ['class' => 'col-form-label']); !!}
                                    {!! Form::select('facility_id', $facilities, null,
                                        ['class'=>'form-control' . ($errors->has('facility_id') ? ' is-invalid' : ''), 'id' => 'facility_id',
                                        'required' => true, 'placeholder' => '']) !!}
                                    @if ($errors->has('facility_id'))
                                        <span class="invalid-feedback"><strong>{{ $errors->first('facility_id') }}</strong></span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">{{ trans('adminlte.create') }}</button>
        </div>
    </form>
@endsection
