$(document).ready(function () {
    // When the document is ready, set up event handling for the button click
    $("#calculateBtn").click(function () {
        // Retrieve values from the input fields
        const operation = $("#operation").val(); // Get the selected operation (Add or Subtract)
        const quantity = parseInt($("#quantity").val()); // Parse the quantity input as an integer
        const timeUnit = $("#timeUnit").val(); // Get the selected time unit (Days, Months, etc.)
        const selectedDate = $("#selectedDate").val(); // Get the selected date

        // Construct the API URL with query parameters
        const apiUrl = `/calculate?operation=${operation}&quantity=${quantity}&timeUnit=${timeUnit}&selectedDate=${selectedDate}`;

        // Set the CSRF token for all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Retrieve the CSRF token from the meta tag
            }
        });

        // Make an AJAX request to the API
        $.ajax({
            url: apiUrl, // Specify the API URL
            method: "post", // Use the POST method for the request
            success: function (data) {
                // Handle a successful response from the API
                $("#result").text(data.result); // Display the result in the HTML
            },
            error: function () {
                // Handle an error response from the API
                $("#result").text("Error occurred while calculating the date.");
            }
        });
    });
});
