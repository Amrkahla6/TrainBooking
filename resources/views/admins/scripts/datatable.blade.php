
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
