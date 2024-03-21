@extends('layouts.app')

@section('content')
    <!-- Loader -->
    <div id="loader" class="spinner-wrapper">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    @php
        $unsortedScore = $unsort;
        arsort($unsort);
        $highlightCategories = array_slice($unsort, 0, 3, true);
        $topSixCategories = array_slice($unsort, 0, 6, true);
        $categoryNames = array_keys($highlightCategories);
    @endphp

    <div class="container">
        <!-- Main -->
        <div class="container text-center">
            <div class="row">
                <div clas s="title text-light mt-sm-1">
                    <div class="col align-self-center text-light" style="margin-top: 40px;">
                        <h4>Hasil RIASEC TEST kamu - <strong>{{ $event->title }}</strong></h4>
                        <h1 class="fw-bolder">{{ $userName }}</h1>
                    </div>
                </div>
            </div>
            <a href="{{ route('view.pdf', $result->id) }}" class="btn btn-primary text-decoration-none border-0 mt-2"
                style="padding: 12px 36px; background: #f72585" target="_blank">
                Unduh hasil tes mu !!!
            </a>
        </div>

        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <!-- Bar Chart -->
                    <div class="mb-3 bar-chart" style="height: 287px;">
                        <canvas id="myChart" class="shadow-lg bg-light p-4 rounded"></canvas>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 mt-5">
                    <table class="table table-striped bg-light rounded shadow p-4 h-100">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($unsort as $category => $value)
                                <tr @if (in_array($value, $highlightCategories)) class="table-warning" @endif>
                                    <td>{{ $category }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="row mt-3 p-2 mb-4">

            @foreach ($mergetArray as $top)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg h-100">
                        <img src="{{ asset($top['category']['images']) }}" alt="{{ $top['category']['category_text'] }}"
                            class="category-image" style="border-radius: 6px;">
                        <div class="card-body">
                            <h3>{{ $top['category']['category_text'] }}</h3>
                            <p class="card-text">{!! nl2br(e($top['category']['description'])) !!}</p>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        @include('components.footer')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('myChart');

        const labels = {!! json_encode(array_keys($unsortedScore)) !!};
        const data = {!! json_encode(array_values($unsortedScore)) !!};
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{

                    // Title
                    label: 'Total',
                    // Data
                    data: data,
                    backgroundColor: [
                        'rgba(115, 152, 15)',
                        'rgba(209, 130, 40)',
                        'rgba(226, 62, 80)',
                        'rgba(252, 181, 0)',
                        'rgba(19, 117, 154)',
                        'rgba(0, 70, 104)',
                        'rgba(201, 203, 207)'
                    ],
                    borderColor: [
                        'rgba(115, 152, 15)',
                        'rgba(209, 130, 40)',
                        'rgba(226, 62, 80)',
                        'rgba(252, 181, 0)',
                        'rgba(19, 117, 154)',
                        'rgba(0, 70, 104)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    }
                }
            }
        });
        // Wait for the DOM content to be fully loaded
        document.addEventListener('DOMContentLoaded', () => {
            console.log('DOM content loaded');

            // Get the spinner wrapper element
            const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

            // Display the spinner
            if (spinnerWrapperEl) {
                spinnerWrapperEl.style.display = 'flex';
                spinnerWrapperEl.style.opacity = '100';
                console.log('Spinner displayed');
            } else {
                console.error('Spinner wrapper element not found');
            }
        });

        // Wait for all resources to be loaded
        window.addEventListener('load', () => {
            console.log('All resources loaded');

            // Hide the spinner
            const spinnerWrapperEl = document.querySelector('.spinner-wrapper');
            if (spinnerWrapperEl) {
                spinnerWrapperEl.style.opacity = '0';

                setTimeout(() => {
                    spinnerWrapperEl.style.display = 'none';
                    console.log('Spinner hidden');
                }, 200);
            } else {
                console.error('Spinner wrapper element not found');
            }
        });

        const spinnerWrapperEl = document.querySelector('.spinner-wrapper');

        // Tampilkan spinner saat halaman dimuat ulang
        window.addEventListener('beforeunload', () => {
            spinnerWrapperEl.style.display = 'flex';
            spinnerWrapperEl.style.opacity = '100';
        });
    </script>
    </script>
@endsection
