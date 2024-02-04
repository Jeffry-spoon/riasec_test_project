@extends('layouts.app')

@section('content')
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
                        <h4>Hasil RIASEC TEST kamu</h4>
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
                    <div class="h-100 mb-3 bar-chart">
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
                            <p class="card-text">{!! nl2br(e ($top['category']['description'])) !!}</p>
                          
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    @include('components.footer')

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
                        'rgba(255, 99, 132)',
                        'rgba(255, 159, 64)',
                        'rgba(255, 205, 86)',
                        'rgba(75, 192, 192)',
                        'rgba(54, 162, 235)',
                        'rgba(153, 102, 255)',
                        'rgba(201, 203, 207)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
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
            },
        });
    </script>
@endsection
