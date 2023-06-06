@extends('layouts.app')

@section('title','Reservation')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reservation Form</div>

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

                        <form  name="reservationForm" action="{{route('reservation.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="current_station">Current Station</label>
                                <input type="text" class="form-control" name="current_station" id="current_station" required>
                            </div>

                            <div class="form-group">
                                <label for="destination_station">Destination Station</label>
                                <input type="text" class="form-control" name="destination_station" id="destination_station" required>
                            </div>

                            <div class="form-group">
                                <label for="number_of_stations">Number of Stations</label>
                                <input type="number" class="form-control" name="number_of_stations"onchange="getNumberOfStationVal()" id="number_of_stations" required>
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" disabled name="price" id="price" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function getNumberOfStationVal(){
            let numberOfStations = document.forms["reservationForm"]["number_of_stations"].value;

            let cost = 0;

            if (numberOfStations >= 1 && numberOfStations <= 7) {
                cost = 5;
            } else if (numberOfStations >= 8 && numberOfStations <= 12) {
                cost = 10;
            } else if (numberOfStations >= 13) {
                cost = 20;
            }

            document.getElementById("price").value = cost;
        }
    </script>
@endsection
