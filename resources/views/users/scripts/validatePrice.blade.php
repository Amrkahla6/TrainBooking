<script>

    /**
     *  Validate Number Of Travel To Calculate Price
     */
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
