<script type="text/javascript">

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    let pusher = new Pusher('95728763494de1cfbd6b', {
        cluster: 'eu'
    });
    let channel = pusher.subscribe('user-reservations');
    channel.bind('ReservationMade', function(data) {
        //Append Number of notifications today
        $('#notifyNumber').empty().append(data['count'])

        //Append the massage
        $(".reservationData").append(`${data['reservation']['user']['name']}  booking from ${data['reservation']['current_station']} to ${data['reservation']['destination_station']}`)
    });
</script>
