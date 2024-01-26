@extends('layouts.app')

@section('content')
    <!-- Main -->
    <div class="container text-center">
        <div class="row">
            <div clas s="title text-light mt-sm-1">
                <div class="col align-self-center" style="margin-top: 40px;">
                    <h2>YOUR RIASEC TEST RESULT</h2>
                    <h1>{{ $userName }}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="contaier">
            <!-- Result Table -->
            <!-- Tabel -->
            <div class="container">
                <div class="bar-chart col-lg-6">
                    <div class="col-md-4 mb-4">
                        <div class="wrapper">
                            <h1>Dynamically generated 3D bar chart</h1>
                            <!-- Bar Chart -->
                            <canvas id="barChart" width="400" height="400"></canvas>
                            <div id="chart">
                                <canvas id="myBarChart" width="400" height="400"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 row">
                    <table class="table table-striped bg-light col-lg-6 border-primary">
                        <thead>
                            <tr>
                                <th>Category</th>
                                <th>Value</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($score as $category => $value)
                                <tr>
                                    <td>{{ $category }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- End Result Table -->
        </div>
    </div>
    <div class="row mt-3 m-4">
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                        card's content.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Ambil data dari PHP dan siapkan untuk digunakan di JavaScript
        var data = @json($score);

        var labels = Object.keys(data);
        var values = Object.values(data);

        // Buat bar chart
        var ctx = document.getElementById('barChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Category Values',
                    data: values,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection
