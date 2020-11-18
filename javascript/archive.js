$(document).ready(function () {
    $('#beerTable tbody').on('click', "#deleteBeer", function () {
        var beer = $(this).parent().children("td").map(function () {
            return $(this).text();
        }).get();

        $.post("functions/deleteBeer.php", {
            beer: beer[0]
        }, function (data) {
            $("#beerTable").html(data);
        });
    });
});

$(document).ajaxComplete(function () {
    $('#beerTable tbody').on('click', "#deleteBeer", function () {
        var beer = $(this).parent().children("td").map(function () {
            return $(this).text();
        }).get();

        $.post("functions/deleteBeer.php", {
            beer: beer[0]
        }, function (data) {
            $("#beerTable").html(data);
        });
    });
});