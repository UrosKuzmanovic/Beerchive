function sliderChange(val) {
    document.getElementById("rating").innerHTML = val;
}

function rateBeer() { // OVO SREDITI

    /*$.ajax({
        url: "functions/rateBeer.php",
        beerRate: slider.value,
        type: 'post',
        success: function() {
            alert("Gotovo");
        }
    });*/

    $.post("functions/rateBeer.php", {
        beerRate: slider.value
    }, function (data, status) {
        $("#test").html(data);
    });
}

function goToTable() {
    document.cookie = "beerName=";
    location.replace("table.php");
}