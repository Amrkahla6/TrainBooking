@extends('layouts.app')

@section('title','Reservation')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1 class="text-center text-secondary m-2">Booking Travel</h1>

            <div class="card">

                <div class="card-header text-secondary">Reservation Form</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                    @include('users.user-form')

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    @include('users.scripts.validatePrice')
@endsection
