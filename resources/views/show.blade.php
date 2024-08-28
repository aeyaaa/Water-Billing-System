<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Records</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="px-2">
    <div class="container mx-lg items-center">
        <form action="{{ route('records.store') }}" method="POST" class="bg-white rounded-lg shadow-lg">
            @csrf
            <div class="overflow-x-auto">
                <table class="w-full bg-white border-collapse">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">CU_M</th>
                            <th class="py-2 px-4">Present</th>
                            <th class="py-2 px-4">Previous</th>
                            <th class="py-2 px-4">Current</th>
                            <th class="py-2 px-4">Arrears</th>
                            <th class="py-2 px-4">Total</th>
                            <th class="py-2 px-4">Payment Current</th>
                            <th class="py-2 px-4">Payment Remarks</th>
                            <th class="py-2 px-4">Date Paid</th>
                            <th class="py-2 px-4">OR Number</th>
                            <th class="py-2 px-4">Bal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($records as $record)
                            <tr class="hover:bg-gray-100">
                                <td class="p-2"><a href="{{ route('records.edit', $record->id) }}">{{ $record->name }}</a></td>
                                <td><input type="text" name="cu_m[]" value="{{ $record->cu_m }}" class="cu-m-input border p-2 w-full rounded" readonly></td>
                                <td><input type="text" name="present[]" value="{{ $record->present }}" class="present-input border p-2 w-full rounded"></td>
                                <td><input type="text" name="previous[]" value="{{ $record->previous }}" class="previous-input border p-2 w-full rounded"></td>
                                <td><input type="text" name="current[]" value="{{ $record->current }}" class="current-input border p-2 w-full rounded"></td>
                                <td><input type="text" name="arrears[]" value="{{ $record->arrears }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="total[]" value="{{ $record->total }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="payment_current[]" value="{{ $record->payment_current }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="payment_remarks[]" value="{{ $record->payment_remarks }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="date_paid[]" value="{{ $record->date_paid }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="or_number[]" value="{{ $record->or_number }}" class="border p-2 w-full rounded"></td>
                                <td><input type="text" name="bal[]" value="{{ $record->bal }}" class="border p-2 w-full rounded"></td>
                                <input type="hidden" name="record_id[]" value="{{ $record->id }}">
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="bg-green-500 text-white px-4 py-2 mt-4 rounded hover:bg-green-600 transition duration-200">Save</button>
        </form>
    </div>

    <script>
        function calculateCuMAndCurrent() {
    const rows = document.querySelectorAll('tbody tr');

    rows.forEach(row => {
        const presentInput = row.querySelector('.present-input');
        const previousInput = row.querySelector('.previous-input');
        const cuMInput = row.querySelector('.cu-m-input');
        const currentInput = row.querySelector('.current-input');
        const arrearsInput = row.querySelector('input[name="arrears[]"]');

        function updateValues() {
            const presentValue = parseFloat(presentInput.value) || 0;
            const previousValue = parseFloat(previousInput.value) || 0;
            const cuMValue = presentValue - previousValue;

            cuMInput.value = cuMValue.toFixed(2); // Update the cu_m field

            // Calculate the commodity charge based on cu_m
            let commodityCharge = 0;
            if (cuMValue >= 100) {
                commodityCharge = 44.00;
            } else if (cuMValue >= 71) {
                commodityCharge = 37.00;
            } else if (cuMValue >= 51) {
                commodityCharge = 32.00;
            } else if (cuMValue >= 31) {
                commodityCharge = 27.00;
            } else if (cuMValue >= 21) {
                commodityCharge = 25.00;
            } else if (cuMValue >= 11) {
                commodityCharge = 23.00;
            }

            const currentValue = (cuMValue * commodityCharge) + 50;
            currentInput.value = currentValue.toFixed(2); // Update the current field

            // If there's any other logic you want to apply to arrears, you can do it here
        }

        presentInput.addEventListener('input', updateValues);
        previousInput.addEventListener('input', updateValues);

        // Initial calculation in case inputs are prefilled
        updateValues();
    });
}

document.addEventListener('DOMContentLoaded', calculateCuMAndCurrent);

    </script>
</body>
</html>
