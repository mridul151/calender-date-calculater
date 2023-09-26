<?php

namespace App\Http\Controllers;

use Carbon\Carbon; // Import the Carbon library for date manipulation
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    public function calculateDate(Request $request)
    {
        // Retrieve input parameters from the request
        $operation = $request->input('operation'); // Get the operation (Add or Subtract)
        $quantity = $request->input('quantity'); // Get the quantity
        $timeUnit = $request->input('timeUnit'); // Get the time unit (e.g., Days, Months, etc.)
        $selectedDate = $request->input('selectedDate'); // Get the selected date

        // Check if the selected date is empty; if so, use the current date and time
        if (empty($selectedDate)) {
            $selectedDate = now(); // Use the current date and time
        }

        // Check if the quantity is not a number
        if (!is_numeric($quantity)) {
            // Set a default date (e.g., today) if quantity is not a valid number
            $resultDate = date('Y-m-d H:i:s'); // Default to the current date and time
        } else {
            // Perform date calculation based on the input operation (Add or Subtract)
            if ($operation === 'add') {
                // Use Carbon library to add the specified quantity of the chosen time unit to the selected date
                $resultDate = date('Y-m-d H:i:s', strtotime("+$quantity $timeUnit", strtotime($selectedDate)));
            } elseif ($operation === 'subtract') {
                // Use Carbon library to subtract the specified quantity of the chosen time unit from the selected date
                $resultDate = date('Y-m-d H:i:s', strtotime("-$quantity $timeUnit", strtotime($selectedDate)));
            } else {
                // Return an error response for an invalid operation
                return response()->json(['error' => 'Invalid operation'], 400);
            }
        }

        // Return the calculated result date as a JSON response
        return response()->json(['result' => $resultDate]);
    }
}
