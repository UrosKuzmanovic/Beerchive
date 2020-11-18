function searchBeer(text) {
    $.post("functions/searchBeer.php", {
        name: text
    }, function (data, status) {
        $("#beerTable").html(data);
    });
}

$(document).ready(function () {
    $('#beerTable tbody').on('click', 'tr', function () {
        var beer = $(this).children("td").map(function () {
            return $(this).text();
        }).get();
        //sessionStorage.beerName = beer[0];
        document.cookie = "beerName=" + beer[0];
        location.replace("beer.php");
    });
});

$(document).ajaxComplete(function () {
    $('#beerTable tbody').on('click', 'tr', function () {
        var beer = $(this).children("td").map(function () {
            return $(this).text();
        }).get();
        //sessionStorage.beerName = beer[0];
        document.cookie = "beerName=" + beer[0];
        location.replace("beer.php");
    });
});

$(document).ready(function () {
    $('#beerTable').on('click', 'th', function () {
        var sortBy = $(this).map(function () {
            return $(this).text();
        }).get();
        sortBy += "";
        $.post("functions/sortTable.php", {
            sort: sortBy
        }, function (data, status) {
            $("#beerTable").html(data);
        });
    });
});

$(document).ajaxComplete(function () {
    $('#beerTable').on('click', 'th', function () {
        var sortBy = $(this).map(function () {
            return $(this).text();
        }).get();
        sortBy += "";
        $.post("functions/sortTable.php", {
            sort: sortBy
        }, function (data, status) {
            $("#beerTable").html(data);
        });
    });
});