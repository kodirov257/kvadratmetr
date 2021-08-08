@extends('layouts.app')

@section('content')
    <form method="POST" action="?">
        @csrf

        @foreach ($project->category->allCharacteristics() as $characteristic)

            <div class="form-group">
                <label for=characteristic_{{ $characteristic->id }}" class="col-form-label">{{ $characteristic->name }}</label>

                @if ($characteristic->isSelect())

                    <select id="characteristic_{{ $characteristic->id }}" class="form-control{{ $errors->has('characteristics.' . $characteristic->id) ? ' is-invalid' : '' }}" name="characteristics[{{ $characteristic->id }}]">
                        <option value=""></option>
                        @foreach ($characteristic->variants as $variant)
                            <option value="{{ $variant }}"{{ $variant == old('characteristics.' . $characteristic->id, $project->getValue($characteristic->id)) ? ' selected' : '' }}>
                                {{ $variant }}
                            </option>
                        @endforeach
                    </select>

                @elseif ($characteristic->isNumber())

                    <input id="characteristic_{{ $characteristic->id }}" type="number" class="form-control{{ $errors->has('characteristics.' . $characteristic->id) ? ' is-invalid' : '' }}" name="characteristics[{{ $characteristic->id }}]" value="{{ old('characteristics.' . $characteristic->id, $project->getValue($characteristic->id)) }}">

                @else

                    <input id="characteristic_{{ $characteristic->id }}" type="text" class="form-control{{ $errors->has('characteristics.' . $characteristic->id) ? ' is-invalid' : '' }}" name="characteristics[{{ $characteristic->id }}]" value="{{ old('characteristics.' . $characteristic->id, $project->getValue($characteristic->id)) }}">

                @endif

                @if ($errors->has('parent'))
                    <span class="invalid-feedback"><strong>{{ $errors->first('characteristics.' . $characteristic->id) }}</strong></span>
                @endif
            </div>

        @endforeach

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

@endsection