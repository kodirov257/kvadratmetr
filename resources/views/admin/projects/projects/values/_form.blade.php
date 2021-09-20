@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ mix('css/fileinput.css', 'build') }}">
    <link rel="stylesheet" href="{{ mix('css/colorpicker.css', 'build') }}">
@endsection
@include ('partials.admin.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('characteristic_id', trans('adminlte.characteristic.name'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('characteristic_id', $characteristics, $characteristic ? $characteristic->id : null,
                                ['class'=>'form-control' . ($errors->has('characteristic_id') ? ' is-invalid' : ''), 'id' => 'characteristic_id',
                                'required' => true, 'placeholder' => '']) !!}
                            @if ($errors->has('characteristic_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('characteristic_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('main', trans('adminlte.main'), ['class' => 'col-form-label']); !!}
                            {!! Form::checkbox('main', 1, old('main', $value ? $value->main : null),
                                    ['class'=>'form-control' . ($errors->has('main') ? ' is-invalid' : '')]) !!}
                            @if ($errors->has('main'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('main') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4" id="main-forms">
                        @if ($characteristic)
                            {!! Form::label('value', trans('adminlte.value.name'), ['class' => 'col-form-label']); !!}
                            @if ($characteristic->isSelect())
                                <select id="value" class="form-control{{ $errors->has('type') ? ' is-invalid' : '' }}" name="value">
                                    <option value=""></option>
                                    @foreach ($characteristic->variants as $variant)
                                        <option value="{{ $variant }}"{{ $variant == $value->value ? ' selected' : '' }}>{{ $variant }}</option>
                                    @endforeach;
                                </select>
                            @elseif($characteristic->isFloat())
                                {!! Form::number('value', $value->value, ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'step' => '0.01', 'required' => $characteristic->required]) !!}
                            @elseif($characteristic->isInteger())
                                {!! Form::number('value', $value->value, ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'required' => $characteristic->required]) !!}
                            @else
                                {!! Form::text('value', $value->value, ['class'=>'form-control' . ($errors->has('value') ? ' is-invalid' : ''),
                                    'required' => $characteristic->required]) !!}
                            @endif
                            @if ($errors->has('value'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('value') }}</strong></span>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="form-group" id="submit-button" style="display: none">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($value ? 'edit' : 'save')) }}</button>
</div>

@include('admin.projects.projects.values._scripts')
