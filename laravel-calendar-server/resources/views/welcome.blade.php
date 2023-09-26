<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}" /> <!-- CSRF token for security -->
    <title>Date Calculator</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Link to the CSS stylesheet -->
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-header">Date Calculator</h2>
            <div class="card-body">
                <form id="dateCalculatorForm"> <!-- Start of the form -->
                    <!-- Operation selection -->
                    <div class="form-group">
                        <label for="operation">Operation:</label>
                        <select class="form-control" id="operation" required>
                            <option value="add">Add</option>
                            <option value="subtract">Subtract</option>
                        </select>
                    </div>

                    <!-- Quantity input -->
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" class="form-control" id="quantity" min="1" required>
                    </div>

                    <!-- Time unit selection -->
                    <div class="form-group">
                        <label for="timeUnit">Time Unit:</label>
                        <select class="form-control" id="timeUnit" required>
                            <option value="days">Days</option>
                            <option value="months">Months</option>
                            <option value="hours">Hours</option>
                            <option value="minutes">Minutes</option>
                            <option value="seconds">Seconds</option>
                        </select>
                    </div>

                    <!-- Date selection -->
                    <div class="form-group">
                        <label for="selectedDate">Select a Date:</label>
                        <input type="date" class="form-control" id="selectedDate" required>
                    </div>

                    <!-- Calculate button -->
                    <button type="button" class="btn btn-primary" id="calculateBtn">Calculate</button>
                </form> <!-- End of the form -->

                <!-- Result section -->
                <div class="result">
                    <h4>Result:</h4>
                    <p id="result"></p>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> <!-- jQuery library -->
    <script src="{{ asset('js/app.js') }}"></script> <!-- Link to the JavaScript application script -->
</body>
</html>
