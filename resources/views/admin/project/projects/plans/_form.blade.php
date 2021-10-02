@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

@section($cssSectionName)
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}">
@endsection
@include ('partials.admin.flash')
<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.main') }}</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('area', trans('adminlte.plan.area'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('area', old('area', $plan ? $plan->area : null), ['class'=>'form-control' . ($errors->has('area') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('area'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('area') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('area_unit', trans('adminlte.plan.area_unit'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('area_unit', $areaUnits, old('area_unit', $plan ? $plan->area_unit : null),
                                ['class'=>'form-control' . ($errors->has('area_unit') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                            @if ($errors->has('area_unit'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('area_unit') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('rooms', trans('adminlte.plan.rooms'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('rooms', old('rooms', $plan ? $plan->rooms : null), ['class'=>'form-control' . ($errors->has('rooms') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('rooms'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('rooms') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('bathroom', trans('adminlte.plan.bathroom'), ['class' => 'col-form-label']); !!}
                            {!! Form::number('bathroom', old('bathroom', $plan ? $plan->bathroom : null), ['class'=>'form-control' . ($errors->has('bathroom') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('bathroom'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('bathroom') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.image') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="image">
                    </div>
                    @if ($errors->has('image'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('image') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($plan ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/piexif.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/purify.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/themes/fa/theme.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/uz.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/ru.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-fileinput/js/locales/LANG.js') }}"></script>
    {{--    <script src="{{ mix('js/fileinput.js', 'build') }}"></script>--}}

    <script>
        let fileInput = $("#file-input");
        let imageUrl = '{{ $plan ? ($plan->image ? $plan->imageOriginal : null) : null }}';

        if (imageUrl) {
            let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
            XMLHttpRequest.prototype.send = function(data) {
                this.setRequestHeader('X-CSRF-Token', token);
                return send.apply(this, arguments);
            };

            fileInput.fileinput({
                initialPreview: [imageUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-image',
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        } else {
            fileInput.fileinput({
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                maxFileCount: 1,
                allowedFileExtensions: ['jpg', 'jpeg', 'png'],
            });
        }
    </script>

@endsection
