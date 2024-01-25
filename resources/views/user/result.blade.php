@extends('layouts.app')

@section('content')

{{-- @dd($categoryResults) --}}

      <!-- Main -->
      <div class="container text-center">
        <div class="row">
        <div clas s="title text-light mt-sm-1">
          <div class="col align-self-center" style="margin-top: 40px;">
            <h2>YOUR RIASEC TEST RESULT</h2>
            <h1>Jeffry</h1>
          </div>
        </div>
        </div>
      </div>
      <div class="row">
        <div class="contaier">
          <!-- Bar Chart -->
          <div class="col-md-4 mb-4">
            <div class="wrapper">
            <h1>Dynamically generated 3D bar chart</h1>
            <p>Add values to the javascript array to edit the chart</p>
                <div id="chart">
                  <canvas id="myBarChart" width="400" height="400"></canvas>
                </div>
            </div>
          </div>

          <!-- End Bar Chart -->

          <!-- Result Table -->
          <div class="col-md-4 mb-4"></div>
          <!-- End Result Table -->
        </div>
      </div>
    <div class="row mt-3 m-4">
      <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>
       <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>

       <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>

       <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>
        <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>
       <div class="col-md-4 mb-4">
         <div class="card">
            <img src="/Assets/background-desktop.png" class="card-img-top" alt="...">
            <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
        </div>
     </div>
    </div>

    <script>
    const labels = Utils.months({count: 7});
const data = {
  labels: labels,
  datasets: [{
    label: 'My First Dataset',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
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
};
    </script>


@endsection
