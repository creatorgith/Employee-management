
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel Cookbook') }}</title>

    <script defer src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js"></script>

    <!-- Styles -->
    @livewireStyles
    <script src="https://cdn.tailwindcss.com"></script>
</head>

@@ -29,6 +32,7 @@
    </div>

    <!-- Scripts -->
    @livewireScripts
    @stack('scripts')
</body>
<div class="bg-white rounded-md border my-8 px-6 py-6 mx-40">
    <div>
        <h2 class="text-2xl font-semibold">Charts</h2>
        <div class="my-6">
            <div>Last Year: {{ array_sum($lastYearOrders) }}</div>
            <div>This Year: {{ array_sum($thisYearOrders) }}</div>
        </div>
        <div class="mt-4"><canvas id="myChart"></canvas></div>
        <livewire:chart-orders />
    </div>
</div>
@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        const data = {
            labels: labels,
            datasets: [{
                label: 'Last Year Orders',
                backgroundColor: 'lightgray',
                data: {{ Js::from($lastYearOrders) }},
            }, {
                label: 'This Year Orders',
                backgroundColor: 'lightgreen',
                data: {{ Js::from($thisYearOrders) }},
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
            }
        };
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
@endpush
{{-- </x-app-layout> --}}