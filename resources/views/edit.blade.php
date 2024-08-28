<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit Record</h2>
        <form action="{{ route('records.update', $record->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            <input type="hidden" name="record_id" value="{{ $record->id }}">

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-gray-700">Name:</label>
                    <input type="text" name="name" value="{{ $record->name }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">CU M:</label>
                    <input type="text" name="cu_m" value="{{ $record->cu_m }}" class="cu-m-input border p-2 rounded w-full bg-gray-100" readonly>
                </div>

                <div>
                    <label class="block text-gray-700">Present:</label>
                    <input type="text" name="present" value="{{ $record->present }}" class="present-input border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Previous:</label>
                    <input type="text" name="previous" value="{{ $record->previous }}" class="previous-input border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Current:</label>
                    <input type="text" name="current" value="{{ $record->current }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Arrears:</label>
                    <input type="text" name="arrears" value="{{ $record->arrears }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Total:</label>
                    <input type="text" name="total" value="{{ $record->total }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Payment Current:</label>
                    <input type="text" name="payment_current" value="{{ $record->payment_current }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Payment Remarks:</label>
                    <input type="text" name="payment_remarks" value="{{ $record->payment_remarks }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Date Paid:</label>
                    <input type="text" name="date_paid" value="{{ $record->date_paid }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">OR Number:</label>
                    <input type="text" name="or_number" value="{{ $record->or_number }}" class="border p-2 rounded w-full">
                </div>

                <div>
                    <label class="block text-gray-700">Bal:</label>
                    <input type="text" name="bal" value="{{ $record->bal }}" class="border p-2 rounded w-full">
                </div>
            </div>

            <div class="flex justify-end mt-6">
                <button type="submit" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition duration-200">Update</button>
            </div>
        </form>
    </div>

    <script>
        function calculateCuM() {
            const presentInput = document.querySelector('.present-input');
            const previousInput = document.querySelector('.previous-input');
            const cuMInput = document.querySelector('.cu-m-input');

            function updateCuM() {
                const presentValue = parseFloat(presentInput.value) || 0;
                const previousValue = parseFloat(previousInput.value) || 0;
                const cuMValue = presentValue - previousValue;

                cuMInput.value = cuMValue.toFixed(2); // Update the cu_m field
            }

            presentInput.addEventListener('input', updateCuM);
            previousInput.addEventListener('input', updateCuM);
        }

        document.addEventListener('DOMContentLoaded', calculateCuM);
    </script>
</body>
</html>
