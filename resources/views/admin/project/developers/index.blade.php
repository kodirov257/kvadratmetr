@extends('layouts.admin.page')

@section('content')
    <div class="card mb-3">
{{--        <div class="card-header">Filter</div>--}}
        <div class="card-body">
            <form action="?" method="GET">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="name" class="col-form-label">Name</label>
                            <input id="name" class="form-control" name="name" value="{{ request('name') }}">
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="contact" class="col-form-label">Contact</label>
                            <input id="contact" class="form-control" name="contact" value="{{ request('contact') }}">
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label class="col-form-label">&nbsp;</label><br />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contacts</th>
            <th>Address</th>
            <th>Landmark</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($developers as $developer)
            <tr>
                <td>{{ $developer->id }}</td>
                <td>
                    <a href="{{ route('admin.project.users.developers.show', ['user' => $developer->owner_id, 'developer' => $developer]) }}">
                        {{ $developer->name }}
                    </a>
                </td>
                <td>
                    @if($developer->main_number)
                        Main number: {{ $developer->main_number }}
                        <br>
                    @endif
                    @if($developer->call_center)
                        Call center: {{ $developer->call_center }}
                        <br>
                    @endif
                    @if($developer->website)
                        Website: {{ $developer->website }}
                        <br>
                    @endif
                    @if($developer->email)
                        Email: {{ $developer->email }}
                        <br>
                    @endif
                    @if($developer->facebook)
                        Facebook: {{ $developer->facebook }}
                        <br>
                    @endif
                    @if($developer->instagram)
                        Instagram: {{ $developer->instagram }}
                        <br>
                    @endif
                    @if($developer->tik_tok)
                        Tik-tok: {{ $developer->tik_tok }}
                        <br>
                    @endif
                    @if($developer->telegram)
                        Telegram: {{ $developer->telegram }}
                        <br>
                    @endif
                    @if($developer->youtube)
                        Youtube: {{ $developer->youtube }}
                        <br>
                    @endif
                    @if($developer->twitter)
                        Twitter: {{ $developer->twitter }}
                    @endif
                </td>
                <td>
                    @if($developer->address)
                        {{ $developer->address }}
                    @endif
                </td>
                <td>
                    @if($developer->landmark)
                        {{ $developer->landmark }}
                    @endif
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

    {{ $developers->links() }}
@endsection