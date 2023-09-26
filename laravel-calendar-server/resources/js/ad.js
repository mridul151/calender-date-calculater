$(document).ready(function () {
    $("#calculateBtn").click(function () {
        const operation = $("#operation").val();
        const quantity = parseInt($("#quantity").val());
        const timeUnit = $("#timeUnit").val();
        const selectedDate = $("#selectedDate").val();

        // Construct API URL with query parameters
        const apiUrl = `/calculate?operation=${operation}&quantity=${quantity}&timeUnit=${timeUnit}&selectedDate=${selectedDate}`;

        // Make an AJAX request to the API
        $.ajax({
            url: apiUrl,
            method: "GET",
            success: function (data) {
                $("#result").text("Result Date: " + data.result);
            },
            error: function () {
                $("#result").text("Error occurred while calculating the date.");
            }
        });
    });
});
