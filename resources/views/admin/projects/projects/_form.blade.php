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
                            {!! Form::text('name_uz', old('name_uz', $project ? $project->name_uz : null), ['class'=>'form-control' . ($errors->has('name_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_uz', 'Tavsifi', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_uz', old('about_uz', $project ? $project->about_uz : null),
                                ['class' => 'form-control' . $errors->has('about_uz') ? ' is-invalid' : '', 'id' => 'about_uz', 'rows' => 10]); !!}
                            @if ($errors->has('about_uz'))
                                <span
                                        class="invalid-feedback"><strong>{{ $errors->first('about_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_uz', 'Manzil', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_uz', old('address_uz', $project ? $project->address_uz : null), ['class'=>'form-control' . ($errors->has('address_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_uz') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_uz', 'Joylashuvi', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_uz', old('landmark_uz', $project ? $project->landmark_uz : null), ['class'=>'form-control' . ($errors->has('landmark_uz') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_uz'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_uz') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="russian" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_ru', 'Название', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_ru', old('name_ru', $project ? $project->name_ru : null), ['class'=>'form-control' . ($errors->has('name_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_ru', 'Описание', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_ru', old('about_ru', $project ? $project->about_ru : null),
                                ['class' => 'form-control' . $errors->has('about_ru') ? ' is-invalid' : '', 'id' => 'about_ru', 'rows' => 10]); !!}
                            @if ($errors->has('about_ru'))
                                <span
                                        class="invalid-feedback"><strong>{{ $errors->first('about_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_ru', 'Адрес', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_ru', old('address_ru', $project ? $project->address_ru : null), ['class'=>'form-control' . ($errors->has('address_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_ru') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_ru', 'Ориентир', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_ru', old('landmark_ru', $project ? $project->landmark_ru : null), ['class'=>'form-control' . ($errors->has('landmark_ru') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_ru'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_ru') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="tab-pane" id="english" role="tabpanel">
                        <div class="form-group">
                            {!! Form::label('name_en', 'Name', ['class' => 'col-form-label']); !!}
                            {!! Form::text('name_en', old('name_en', $project ? $project->name_en : null), ['class'=>'form-control' . ($errors->has('name_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('name_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('name_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('about_en', 'about', ['class' => 'col-form-label']); !!}
                            {!! Form::textarea('about_en', old('about_en', $project ? $project->about_en : null),
                                ['class' => 'form-control' . $errors->has('about_en') ? ' is-invalid' : '', 'id' => 'about_en', 'rows' => 10]); !!}
                            @if ($errors->has('about_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('about_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('address_en', 'Address', ['class' => 'col-form-label']); !!}
                            {!! Form::text('address_en', old('address_en', $project ? $project->address_en : null), ['class'=>'form-control' . ($errors->has('address_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('address_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('address_en') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group">
                            {!! Form::label('landmark_en', 'Landmark', ['class' => 'col-form-label']); !!}
                            {!! Form::text('landmark_en', old('landmark_en', $project ? $project->landmark_en : null), ['class'=>'form-control' . ($errors->has('landmark_en') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('landmark_en'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('landmark_en') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug', ['class' => 'col-form-label']); !!}
                    {!! Form::text('slug', old('slug', $project ? $project->slug : null), ['class'=>'form-control' . ($errors->has('slug') ? ' is-invalid' : ''), 'id' => 'slug', 'required' => true]) !!}
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
        <div class="card card-gray card-outline">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('category_id', trans('adminlte.product.category'), ['class' => 'col-form-label']); !!}
                            {!! Form::select('category_id', $categories, old('category_id', $project ? $project->category_id : null),
                                ['class'=>'form-control' . ($errors->has('category_id') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                            @if ($errors->has('category_id'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('category_id') }}</strong></span>
                            @endif
                        </div>
                    </div>
{{--                    <div class="col-md-12">--}}
{{--                        <div class="form-group">--}}
{{--                            {!! Form::label('region_id', trans('adminlte.region'), ['class' => 'col-form-label']); !!}--}}
{{--                            {!! Form::select('region_id', $regions, old('region_id', $project ? $project->region_id : null),--}}
{{--                                ['class'=>'form-control' . ($errors->has('region_id') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}--}}
{{--                            @if ($errors->has('region_id'))--}}
{{--                                <span class="invalid-feedback"><strong>{{ $errors->first('region_id') }}</strong></span>--}}
{{--                            @endif--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('lng', trans('adminlte.longitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('lng', old('lng', $project ? $project->lng : null), ['class'=>'form-control' . ($errors->has('lng') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('lng'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('lng') }}</strong></span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('ltd', trans('adminlte.latitude'), ['class' => 'col-form-label']); !!}
                            {!! Form::text('ltd', old('ltd', $project ? $project->ltd : null), ['class'=>'form-control' . ($errors->has('ltd') ? ' is-invalid' : ''), 'required' => true]) !!}
                            @if ($errors->has('ltd'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('ltd') }}</strong></span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card mb-3">
    <div class="card-header">
        Common
    </div>
    <div class="card-body pb-2">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price" class="col-form-label">Price</label>
                    <input id="price" type="number" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required>
                    @if ($errors->has('price'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('price') }}</strong></span>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('status', trans('adminlte.status'), ['class' => 'col-form-label']); !!}
                    {!! Form::select('status', $statuses, old('status', $project ? $project->status : null),
                        ['class'=>'form-control' . ($errors->has('status') ? ' is-invalid' : ''), 'placeholder' => '', 'required' => true]) !!}
                    @if ($errors->has('status'))
                        <span class="invalid-feedback"><strong>{{ $errors->first('status') }}</strong></span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">{{ trans('adminlte.' . ($project ? 'edit' : 'save')) }}</button>
</div>

@section($javaScriptSectionName)
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('about_uz');
        CKEDITOR.replace('about_ru');
        CKEDITOR.replace('about_en');
        $('#category_id').select2();
        $('#region_id').select2();
        $('#developer_id').select2();
    </script>
@endsection