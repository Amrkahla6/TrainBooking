



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
        <input type="number" class="form-control" min="1" name="number_of_stations" onchange="getNumberOfStationVal()" id="number_of_stations" required>
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="number" class="form-control" disabled name="price" id="price" required>
    </div>

    <button type="submit" id="save_reservation" class="btn btn-primary m-2">Submit Travel</button>
</form>
