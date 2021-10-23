@extends('layouts.developer.app')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-8">
                <form method="POST" action="{{route('cabinet.projects.update', $project->id)}}" enctype="multipart/form-data">
                    @csrf
                    @include('cabinet.projects._project_body')
                </form>
            </div>
            @include('partials.components.dashboard._sidebar_info_developer')
        </div>
    </div>
    <script>
        function showDatepicker() {
            datePicker = document.getElementById('datepicker');
            if (datePicker.classList.contains('d-none')) {
                datePicker.classList.remove('d-none')
            } else {
                datePicker.classList.add('d-none')
            }
        }

        $("#datepicker").datepicker();
    </script>

@endsection