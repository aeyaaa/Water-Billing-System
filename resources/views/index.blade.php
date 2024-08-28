<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ST. BENILDE</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@if(session('success'))
    <div id="success-message" class="fixed top-4 right-4 bg-green-500 text-white p-4 rounded shadow-lg opacity-0 transition-opacity duration-500">
        {{ session('success') }}
    </div>
@endif

<body class="bg-blue-200 p-6" style="background-image: url('{{ asset('images/3bg.jpg') }}'); background-size:cover; background-position:enter; background-repeat: no-repeat; height: 0vh;">

    <header class="mb-6 flex justify-end items-center space-x-4 ">
        <p class="text-blue-950 text-s font-bold">Welcome Ms Reve!</p>
        <button class="bg-red-700 text-white rounded-lg px-7 py-1">Log Out</button>
    </header>
    <hr class="border-blue-950 border-t-4 px-6 py-2">

    <div class="mb-6 text-white">
            <p class="text-5xl font-bold">St. Benilde Homes</p>
            <p class="text-2xl font-bold">Water Bill</p>
    </div>

    <div class="lg mx-px bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <select id="month-select" class="border p-2 rounded w-1/3">
                @foreach($months as $month)
                    <option value="{{ $month->id }}">{{ $month->month }} {{ $month->year }}</option>
                @endforeach
            </select>
            <button id="add-month-btn" class="bg-blue-700 text-white px-4 py-2 rounded">Add New Month</button>
        </div>

        <div id="month-form" class="hidden">
            <form action="/months" method="POST" class="bg-white p-4 rounded shadow-md">
                @csrf
                <div class="mb-4">
                    <label for="month" class="block text-gray-700">Month:</label>
                    <input type="text" name="month" id="month" class="border p-2 w-full rounded" placeholder="">
                </div>
                <div class="mb-4">
                    <label for="year" class="block text-gray-700">Year:</label>
                    <input type="text" name="year" id="year" class="border p-2 w-full rounded">
                </div>
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>

        <div id="records-table" class="hidden mt-6">
            <!-- Records table will be dynamically loaded here -->
        </div>
    </div>

    <script>
        document.getElementById('add-month-btn').addEventListener('click', function() {
            document.getElementById('month-form').classList.toggle('hidden');
        });

        document.getElementById('month-select').addEventListener('change', function() {
            const monthId = this.value;
            fetch(`/months/${monthId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('records-table').innerHTML = html;
                    document.getElementById('records-table').classList.remove('hidden');
                });
        });

        document.getElementById('month').addEventListener('input', function() {
            const monthInput = this.value.trim().toUpperCase();
            const monthNames = {
                "JAN": "JANUARY", "FEB": "FEBRUARY", "MAR": "MARCH", "APR": "APRIL",
                "MAY": "MAY", "JUN": "JUNE", "JUL": "JULY", "AUG": "AUGUST",
                "SEP": "SEPTEMBER", "OCT": "OCTOBER", "NOV": "NOVEMBER", "DEC": "DECEMBER",
                "01": "JANUARY", "02": "FEBRUARY", "03": "MARCH", "04": "APRIL",
                "05": "MAY", "06": "JUNE", "07": "JULY", "08": "AUGUST",
                "09": "SEPTEMBER", "10": "OCTOBER", "11": "NOVEMBER", "12": "DECEMBER"
            };

            if (monthNames[monthInput]) {
                this.value = monthNames[monthInput];
            }
        });

        function addRowClickEvent() {
            const rows = document.querySelectorAll('#records-table tr');
            rows.forEach(row => {
                row.classList.add('hover-highlight'); // Add hover effect class
                row.addEventListener('click', function() {
                    const recordId = this.getAttribute('data-record-id'); // Assuming each row has a data attribute for record ID
                    window.location.href = `/record-info/${recordId}`; // Redirect to the record's information page
                });
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            const rows = document.querySelectorAll('.clickable-row');
            rows.forEach(row => {
                row.addEventListener('click', function() {
                    const recordId = this.getAttribute('data-record-id');
                    window.location.href = `/edit-record/${recordId}`; // Adjust the URL as needed
                });
            });

            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.opacity = 1; // Fade in the message
                setTimeout(() => successMessage.style.opacity = 0, 3000); // Start fading out after 3 seconds
                setTimeout(() => successMessage.remove(), 3500); // Remove after fade-out
            }
        });
    </script>
</body>
</html>
