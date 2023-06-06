@extends('layouts.app')

@section('title','Reservation')

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservation</div>
                <div class="card-body">
                    <div class="container">
                        <table id="reservationTable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Current Station</th>
                                <th>Destination Station</th>
                                <th>Number of Stations</th>
                                <th>Price</th>
                                <th>Username</th>
                            </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')

    @include('admins.scripts.datatable')
    @include('admins.scripts.pusher')

@endsection
