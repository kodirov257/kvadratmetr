@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    
@endsection

@include ('partials.admin.flash')

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    {!! Form::label('address_uz', 'Manzili', ['class' => 'col-form-label']); !!}
                    {!! Form::text('address_uz', old('address_uz', $saleOffice ? $saleOffice->address_uz : null), ['class'=>'form-control' . ($errors->has('address_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('address_uz'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('address_uz') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('address_ru', 'Адрес', ['class' => 'col-form-label']); !!}
                    {!! Form::text('address_ru', old('address_ru', $saleOffice ? $saleOffice->address_ru : null), ['class'=>'form-control' . ($errors->has('address_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('address_ru'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('address_ru') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('address_en', 'Address', ['class' => 'col-form-label']); !!}
                    {!! Form::text('address_en', old('address_en', $saleOffice ? $saleOffice->address_en : null), ['class'=>'form-control' . ($errors->has('address_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('address_en'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('address_en') }}</strong></span>
                    @endif
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('ltd', trans('adminlte.latitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('ltd', old('ltd', $saleOffice ? $saleOffice->ltd : null), ['class'=>'form-control' . ($errors->has('ltd') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('ltd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('ltd') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lng', trans('adminlte.longitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('lng', old('lng', $saleOffice ? $saleOffice->lng : null), ['class'=>'form-control' . ($errors->has('lng') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('lng'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('lng') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($saleOffice ? 'edit' : 'save')) }}</button>
</div>
