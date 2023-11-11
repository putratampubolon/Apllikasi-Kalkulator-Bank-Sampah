@extends('layout.template')

@section('container')
    <div class="pagetitle">
        <h1 class="mb-3">Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <canvas id="sampahChart" width="400" height="200"></canvas>
                        <script>
                            // Data dari server (contoh)
                            var dataSampah = {
                                labels: {!! json_encode($labels) !!},
                                datasets: [{
                                    label: 'Banyak Sampah',
                                    data: {!! json_encode($data) !!},
                                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            };
                        
                            var ctx = document.getElementById('sampahChart').getContext('2d');
                            var sampahChart = new Chart(ctx, {
                                type: 'bar',
                                data: dataSampah,
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
