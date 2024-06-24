@extends('layouts.app')
@include('layouts.navbar')

<div class="flex justify-center mt-24 space-x-6">
    <!-- Jam Section -->
    <div class="w-1/4 h-32 flex items-center justify-center">
        <p id="digital-clock" class="text-gray-800 dark:text-red-500 font-bold text-4xl lg:text-6xl sm:text-sm drop-shadow-lg">
            Jam
        </p>
    </div>

    <!-- Dashboard Admin Section -->
    <div class="w-1/2 h-32 flex items-center justify-center border border-black dark:border-white rounded-lg">
        <p class="text-gray-800 dark:text-white text-xl font-bold text-center drop-shadow-lg">
            Dashboard Admin
        </p>
    </div>

    <!-- Tanggal & Hari Section -->
    <div class="w-1/4 h-32 flex flex-col items-center justify-center">
        <p id="date" class="text-gray-800 dark:text-red-500 text-xl">
            Tanggal
        </p>
        <p id="day" class="text-gray-800 dark:text-white text-lg font-bold mt-2">
            Hari
        </p>
    </div>
</div>

<form action="{{ route('home') }}" method="GET" class="mb-5 mt-8 px-4">
    <div class="flex items-center">
        <select name="search" id="search" class="dark:bg-gray-900 bg-white dark:text-white border border-gray-900 dark:border-white rounded-lg p-2">
            <option value="">Terbaru</option>
            @for ($year = date('Y'); $year >= 2020; $year--)
                <option value="{{ $year }}" {{ $year == $tahun ? 'selected' : '' }}>{{ $year }}</option>
            @endfor
        </select>
        <button type="submit"
            class="text-black dark:text-white bg-white dark:bg-gray-900 border border-black dark:border-white font-medium rounded-lg text-sm px-4 py-2.5 ml-2 inline-flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2z"/>
              </svg>
        </button>
    </div>
</form>

<div class="flex mb-10 ml-3 mr-6">
    <div class="w-auto lg:w-9/12 bg-white dark:bg-gray-900 border border-gray-800 dark:border-white p-10 rounded-lg flex items-center justify-center lg:mb-0">
        <canvas id="area-chart" class="w-auto h-auto"></canvas>
    </div>
    <div class="w-full lg:w-3/12 flex flex-col lg:ml-4">
        <div class="flex flex-col bg-white dark:bg-gray-900  border border-gray-900 dark:border-white rounded-lg mb-4">
            <div class="p-4">
                <span class="text-gray-900 dark:text-white font-bold">Anggota: </span>
                <span class="text-gray-900 dark:text-white"><b>{{ $totalAnggota }}</b> Orang</span>
            </div>
        </div>
        <div class="flex flex-col bg-white dark:bg-gray-900 border border-black dark:border-white rounded-lg mb-4">
            <div class="p-4">
                <span class="text-gray-900 dark:text-white font-bold">OTA:</span>
                <span class="text-gray-900 dark:text-white"><b>{{ $totalDaftarOta }}</b> Orang</span>
            </div>
        </div>
        <div class="flex flex-col bg-white dark:bg-gray-900 border border-black dark:border-white rounded-lg">
            <div class="p-4">
                <span class="text-gray-900 dark:text-white font-bold">Pesantren:</span>
                <span class="text-gray-900 dark:text-white"><b>{{ $totalPondok }}</b>&nbsp; Pondok</span>
            </div>
        </div>
        <div class="flex flex-col mt-4 bg-white dark:bg-gray-900 border border-black dark:border-white rounded-lg">
            <div class="p-4">
                <span class="text-gray-900 dark:text-white font-bold">Debit {{ $tahun }}:</span>
                <span class="text-gray-900 dark:text-white"><b>Rp.{{ number_format($totalDanaMasuk, 0, ',', '.') }}</b></span>
            </div>
        </div>
        <div class="flex flex-col mt-4 bg-white dark:bg-gray-900 border border-black dark:border-white rounded-lg">
            <div class="p-4">
                <span class="text-gray-900 dark:text-white font-bold">Beras dibagi {{ $tahun }}: {{ number_format($totalBerasDonasi, 3, ',', '.') }} SAK</span>
                <span class="text-gray-900 dark:text-white"><b></span>
            </div>
        </div>
        <div class="flex flex-col p-2 mt-4 bg-white dark:bg-gray-900 border border-black dark:border-white rounded-lg">
            <canvas id="myChart2" class="w-full h-auto"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // =========== CHART BAR ============

    var ctx = document.getElementById('area-chart').getContext('2d');
    var gradient = ctx.createLinearGradient(0, 0, 0, 300);
    gradient.addColorStop(0, 'rgba(75, 192, 192, 0.2)');
    gradient.addColorStop(1, 'rgba(75, 192, 192, 0.8)');

    var data = [
        @foreach ($totalBerasDonasiPerBulan as $total)
            {{ $total }},
        @endforeach
    ];

    var chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Data Beras Dibagi',
                data: data,
                backgroundColor: gradient,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 4,
                tension: 0.4,
                fill: true
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // =========== CHART DONAT ============

    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var data2 = {
        labels: ['Jumlah Anggota', 'Jumlah OTA', 'Jumlah Pondok Mitra'],
        datasets: [{
            label: ['Jumlah Total'],
            data: [{{ $totalAnggota }}, {{ $totalDaftarOta }}, {{ $totalPondok }}],
            backgroundColor: ['rgb(255, 99, 100)', 'rgb(54, 162, 235)', 'rgb(29, 205, 86)'],
            hoverOffset: 10
        }]
    };

    var options2 = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            r: {
                angleLines: {
                    display: true
                },
                suggestedMin: 0,
                suggestedMax: 350,
                grid: {
                    color: '#ccc',
                    circular: true
                },
                pointLabels: {
                    color: '#333',
                    font: {
                        weight: 'bold'
                    }
                }
            }
        }
    };

    var myChart = new Chart(ctx2, {
        type: 'doughnut',
        data: data2,
        options: options2
    });

    // ========== JAM DIGITAL ==========
    function updateClock() {
        var now = new Date();
        var hours = now.getHours();
        var minutes = now.getMinutes();
        var seconds = now.getSeconds();

        hours = hours < 10 ? '0' + hours : hours;
        minutes = minutes < 10 ? '0' + minutes : minutes;
        seconds = seconds < 10 ? '0' + seconds : seconds;

        var time = hours + ':' + minutes + ':' + seconds;
        document.getElementById('digital-clock').textContent = time;

        setTimeout(updateClock, 1000);
    }

    updateClock();

    function updateDateAndDay() {
        var now = new Date();
        var options = {
            weekday: 'long',
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        };
        var date = now.toLocaleDateString('id-ID', options);
        var day = now.toLocaleDateString('id-ID', {
            weekday: 'long'
        });

        document.getElementById('date').textContent = date;
        document.getElementById('day').innerHTML = "Sekarang hari <mark>" + day + "</mark>";
    }

    updateDateAndDay();

    var calendarButton = document.getElementById('calendar-button');
    calendarButton.addEventListener('click', openCalendar);

    function showLoading() {
        document.querySelector('#loading').classList.add('loading');
        document.querySelector('#loading-content').classList.add('loading-content');
    }

    function hideLoading() {
        document.querySelector('#loading').classList.remove('loading');
        document.querySelector('#loading-content').classList.remove('loading-content');
    }
</script>
