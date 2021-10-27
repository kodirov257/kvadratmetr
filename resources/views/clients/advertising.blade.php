@extends('layouts.front-app')

@section('breadcrumbs', '')

@section('content')
    <section class="advertising-page">
        <div class="container">
            <div class="bradcrump">
                <a href="#">Main Page</a><i class="icon-right"></i>
                <a href="#" class="active">Advertising</a>
            </div>
            <div class="title-flex">
                <h1 class="page-title text-align-left">Advertising Prices</h1>
                <a href="#" class="print-button"
                ><i class="icon-printer"></i>Print Contact info</a
                >
            </div>
            <div class="advertising-tables">
                @include('clients.layout.flash-advertisement-info')

                <div class="advertising-table">
                    @include('clients.layout.table-advertisement')
                </div>

                @include('clients.layout.flash-advertisement-info')

                <div class="advertising-table">
                    @include('clients.layout.table-advertisement')
                </div>
            </div>
        </div>
    </section>

@endsection