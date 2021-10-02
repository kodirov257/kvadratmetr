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
                <div class="form-group">
                    {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_uz', old('name_uz', $facility ? $facility->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_uz'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_ru', old('name_ru', $facility ? $facility->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_ru'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                    {!! Form::text('name_en', old('name_en', $facility ? $facility->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('name_en'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                    @endif
                </div>

                <div class="form-group">
                    {!! Form::label('comment', 'Comment', ['class' => 'col-form-label']); !!}
                    {!! Form::textarea('comment', old('name_en', $facility ? $facility->comment : null), ['class'=>'form-control' . ($errors->has('comment') ? ' is-invalid' : ''), 'required' => true]) !!}
                    @if ($errors->has('comment'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('comment') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-header"><h3 class="card-title">{{ trans('adminlte.icon') }}</h3></div>
            <div class="card-body">
                <div class="form-group">
                    <div class="file-loading">
                        <input id="file-input" class="file" type="file" name="icon">
                    </div>
                    @if ($errors->has('icon'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('icon') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($facility ? 'edit' : 'save')) }}</button>
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
        let iconUrl = '{{ $facility ? ($facility->icon ? $facility->iconOriginal : null) : null }}';

        if (iconUrl) {
            let send = XMLHttpRequest.prototype.send, token = $('meta[name="csrf-token"]').attr('content');
            XMLHttpRequest.prototype.send = function(data) {
                this.setRequestHeader('X-CSRF-Token', token);
                return send.apply(this, arguments);
            };

            fileInput.fileinput({
                initialPreview: [iconUrl],
                initialPreviewAsData: true,
                showUpload: false,
                previewFileType: 'text',
                browseOnZoneClick: true,
                overwriteInitial: true,
                deleteUrl: 'remove-icon',
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
