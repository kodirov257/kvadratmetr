@if (!config('adminlte.enabled_laravel_mix'))
    @php($cssSectionName = 'css')
    @php($javaScriptSectionName = 'js')
@else
    @php($cssSectionName = 'mix_adminlte_css')
    @php($javaScriptSectionName = 'mix_adminlte_js')
@endif

<div class="row">
    <div class="col-md-12">
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="uzbek" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_uz', 'Nomi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_uz', old('name_uz', $developer ? $developer->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_uz', old('about_uz', $developer ? $developer->about_uz : null),
                                ['class' => 'form-control' . $errors->has('about_uz') ? ' is-invalid' : '', 'id' => 'about_uz', 'rows' => 10]); !!}
                            @if ($errors->has('about_uz'))
                                <span
                                        class="invalid-feedback"><strong>{{ $errors->first('about_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_uz', 'Manzil', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_uz', old('address_uz', $developer ? $developer->address_uz : null), ['class'=>'form-control' . ($errors->has('address_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_uz', 'Joylashuvi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_uz', old('landmark_uz', $developer ? $developer->landmark_uz : null), ['class'=>'form-control' . ($errors->has('landmark_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $developer ? $developer->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_ru', old('about_ru', $developer ? $developer->about_ru : null),
                                ['class' => 'form-control' . $errors->has('about_ru') ? ' is-invalid' : '', 'id' => 'about_ru', 'rows' => 10]); !!}
                            @if ($errors->has('about_ru'))
                                <span
                                        class="invalid-feedback"><strong>{{ $errors->first('about_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_ru', 'Адрес', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_ru', old('address_ru', $developer ? $developer->address_ru : null), ['class'=>'form-control' . ($errors->has('address_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_ru', 'Ориентир', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_ru', old('landmark_ru', $developer ? $developer->landmark_ru : null), ['class'=>'form-control' . ($errors->has('landmark_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $developer ? $developer->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_en', 'about', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_en', old('about_en', $developer ? $developer->about_en : null),
                                ['class' => 'form-control' . $errors->has('about_en') ? ' is-invalid' : '', 'id' => 'about_en', 'rows' => 10]); !!}
                            @if ($errors->has('about_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('about_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_en', 'Address', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_en', old('address_en', $developer ? $developer->address_en : null), ['class'=>'form-control' . ($errors->has('address_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_en', 'Landmark', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_en', old('landmark_en', $developer ? $developer->landmark_en : null), ['class'=>'form-control' . ($errors->has('landmark_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_en') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('ltd', trans('adminlte.latitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('ltd', old('ltd', $developer ? $developer->ltd : null), ['class'=>'form-control' . ($errors->has('ltd') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('ltd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('ltd') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lng', trans('adminlte.longitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('lng', old('lng', $developer ? $developer->lng : null), ['class'=>'form-control' . ($errors->has('lng') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('lng'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('lng') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
                    {!! Form::text('slug', old('slug', $developer ? $developer->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'id' => 'slug', 'required' => true]) !!}
                    @if ($errors->has('slug'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('slug') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="card card-primary card-outline">
            <div class="card-header"><h3 class="card-title">Contacts</h3></div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="main_number" class="col-form-label">Contact number</label>
                            <input id="main_number" class="form-control{{ $errors->has('main_number') ? ' is-invalid' : '' }}" name="main_number" value="{{ old('main_number', $developer ? $developer->main_number : null) }}">
                            @if ($errors->has('main_number'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('main_number') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="call_center" class="col-form-label">Call center number</label>
                            <input id="call_center" class="form-control{{ $errors->has('call_center') ? ' is-invalid' : '' }}" name="call_center" value="{{ old('call_center', $developer ? $developer->call_center : null) }}">
                            @if ($errors->has('call_center'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('call_center') }}</strong></span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="website" class="col-form-label">Website</label>
                            <input id="website" type="text" class="form-control{{ $errors->has('website') ? ' is-invalid' : '' }}" name="website" value="{{ old('website', $developer ? $developer->website : null) }}">
                            @if ($errors->has('website'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('website') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="facebook" class="col-form-label">Facebook</label>
                            <input id="facebook" type="text" class="form-control{{ $errors->has('facebook') ? ' is-invalid' : '' }}" name="facebook" value="{{ old('facebook', $developer ? $developer->facebook : null) }}">
                            @if ($errors->has('facebook'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('facebook') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="instagram" class="col-form-label">Instagram</label>
                            <input id="instagram" type="text" class="form-control{{ $errors->has('instagram') ? ' is-invalid' : '' }}" name="instagram" value="{{ old('instagram', $developer ? $developer->instagram : null) }}">
                            @if ($errors->has('instagram'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('instagram') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tik_tok" class="col-form-label">Tik-tok</label>
                            <input id="tik_tok" type="text" class="form-control{{ $errors->has('tik_tok') ? ' is-invalid' : '' }}" name="tik_tok" value="{{ old('tik_tok', $developer ? $developer->tik_tok : null) }}">
                            @if ($errors->has('tik_tok'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('tik_tok') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="telegram" class="col-form-label">Telegram</label>
                            <input id="telegram" type="text" class="form-control{{ $errors->has('telegram') ? ' is-invalid' : '' }}" name="telegram" value="{{ old('telegram', $developer ? $developer->telegram : null) }}">
                            @if ($errors->has('telegram'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('telegram') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="youtube" class="col-form-label">Youtube</label>
                            <input id="youtube" type="text" class="form-control{{ $errors->has('youtube') ? ' is-invalid' : '' }}" name="youtube" value="{{ old('youtube', $developer ? $developer->youtube : null) }}">
                            @if ($errors->has('youtube'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('youtube') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="twitter" class="col-form-label">Twitter</label>
                            <input id="twitter" type="text" class="form-control{{ $errors->has('twitter') ? ' is-invalid' : '' }}" name="twitter" value="{{ old('twitter', $developer ? $developer->twitter : null) }}">
                            @if ($errors->has('twitter'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('twitter') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($developer ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('about_uz');
        CKEDITOR.replace('about_ru');
        CKEDITOR.replace('about_en');
    </script>
@endsection