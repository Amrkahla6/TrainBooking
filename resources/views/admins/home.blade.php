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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#reservationTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.reservations.data') !!}',
                columns: [
                    { data: 'current_station', name: 'current_station' },
                    { data: 'destination_station', name: 'destination_station' },
                    { data: 'number_of_stations', name: 'number_of_stations' },
                    { data: 'price', name: 'price' },
                    { data: 'user.name', name: 'user_id' }
                ]
            });
        });
    </script>
@endsection
